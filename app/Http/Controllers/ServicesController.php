<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Card;
use \App\Price;
use \App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $menu = $title = "Mis pedidos";

        $services = Service::whereHas('status', function($query) {
            $query->where('name', 'Pendiente');
        });

        if ($this->current_user->role->role == 'Administrador') {
	        $services = $services->get();
        } else {
        	$services = $services->where('user_id', $this->current_user->id)->get();
        }

        if ($req->ajax()) {
            return view('services.content', ['services' => $services]);
        }
        return view('services.index', ['services' => $services, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Pedido";
        $prices = Price::all();
        $cards = Card::where('user_id', $this->current_user->id)->get();
        $address = $this->current_user->address;

        return view('services.form', ['cards' => $cards, 'prices' => $prices, 'address' => $address, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Process a transaction and saves a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $card = Card::find($req->card_id);
        $user = User::find($this->current_user->id);
        $price = Price::find($req->monthly_payment);
        $img = $this->upload_file($req->file('product_img'), 'img/products', true);

        if (!$card) { response(['msg' => 'Tarjeta no encontrada, trate nuevamente', 'status' => 'error'], 400); }
        if (!$user) { response(['msg' => 'Usuario no encontrado, sin privilegios o sesión inválida, inicie sesión nuevamente', 'status' => 'error'], 400); }
        if (!$price) { response(['msg' => 'Mensualidad inválida, porfavor, trate de nuevo', 'status' => 'error'], 400); }
        if (!$img) { response(['msg' => 'Imágen inválida, porfavor, trate con una distinta', 'status' => 'error'], 400); }

        $final_price = (($price->percentage + 100) / 100);
        $final_price = ($final_price * $req->product_price) * 100;

        try {
            $order_args = array(
                "line_items" => array(
                    array(
                        "name" => $req->product_name,
                        "unit_price" => $final_price,
                        "quantity" => 1
                    )//first line_item
                ), //line_items
                "shipping_lines" => array(
                    array(
                        "amount" => 0,
                        "carrier" => "Todo intereses"
                    )
                ), //shipping_lines
                "currency" => "MXN",
                "customer_info" => array(
                    "customer_id" => $user->conekta_customer_id
                ), //customer_info
                "shipping_contact" => array(
                    "phone" => $user->phone,
                    "receiver" => $req->receiver ? $req->receiver : 'cliente',
                    "address" => array(
                        'street1' => $req->street,
                        'city' => $req->city,
                        'state' => $req->state,
                        'country' => 'MX',
                        'postal_code' => $req->postal_code,
                        'residential' => 1
                    )//address
                ), //shipping_contact
            );//order

            if ($price->monthly_payment > 0) {//With monthly installments
                $order_args['charges'] = array(
                    array(
                        "payment_method" => array(
                            "type" => "card",
                            "payment_source_id" => $card->token,
                            "monthly_installments" => $price->monthly_payment,
                        )
                    ) //first charge
                ); //charges
            } else {
                $order_args['charges'] = array(
                    array(
                        "payment_method" => array(
                            "type" => "card",
                            "payment_source_id" => $card->token,
                        )
                    ) //first charge
                ); //charges
            }

            $order = \Conekta\Order::create(
                $order_args
            );

            $service = New Service;
            
            $service->user_id = $user->id;
            $service->customer_name = $user->name;
            $service->customer_email = $user->email;
            $service->customer_img = $user->img;
            $service->conekta_order_id = $order->id;
            $service->conekta_customer_id = $user->conekta_customer_id;
            $service->total = $order->amount;
            $service->fee = $order->charges[0]->fee;/*Taxation sensation*/
            $service->phone = $user->phone;
            $service->receiver = $req->receiver ? $req->receiver : 'cliente';
            $service->street = $req->street;
            $service->colony = $req->colony;
            $service->out_num = $req->out_num;
            $service->int_num = $req->int_num;
            $service->city = $req->city;
            $service->state = $req->state;
            $service->country = 'MX';
            $service->postal_code = $req->postal_code;
            $service->payment_method = 'card';
            $service->card_id = $card->id;
            $service->last_digits_card = $card->last_digits;
            $service->product_name = $req->product_name;
            $service->comment = $req->comment;
            $service->product_img = $img;
            $service->monthly_payment = $price->monthly_payment;
            $service->price = $req->product_price * 100;
            $service->tax_percentage = $price->percentage;
            $service->product_link = $req->product_link;
            $service->status_id = 1;
            $service->is_finished = 0;

            $service->save();

            return response(['msg' => 'El pedido ha sido cobrado exitósamente, puede consultar los detalles del pedido en el módulo de mis pedidos activos', 'status' => 'success', 'url' => url('services/active')], 200);

        } catch (\Conekta\ErrorList $errorList) {
            $msg_errors = '';

            foreach($errorList->details as &$errorDetail) {
                $msg_errors .= $errorDetail->getMessage();
            }

            $mensaje = 'Cargo no realizado, error por concepto de: '.$msg_errors;

            return response(['msg' => $mensaje, 'status' => 'error'], 500);
        }
    }

    /**
     * Change the status of the specified resource.
     *
     */
    public function change_status(Request $req)
    {
        $services = Service::whereIn('id', $req->ids)
        ->update(['status_id' => $req->change_to]);
        //delete();
        if ($services) {
            $data = ['url' => url("services/$req->url_param"), 'status' => 'success', 'msg' => 'Éxito cambiando el status del cliente', 'refresh' => 'content'];
            return response($data, 200);
        } else {
            return response(['msg' => 'Usuario no encontrado o inválido', 'status' => 'error', 'url' => url('customers')], 404);
        }
    }

    /**
     * Show the services history.
     *
     */
    public function history(Request $req)
    {
        $menu = $title = "Historial de pedidos";

        $services = Service::whereHas('status', function($query) {
            $query->where('name', 'Finalizado');
        });

        if ($this->current_user->role->role == 'Administrador') {
            $services = $services->get();
        } else {
            $services = $services->where('user_id', $this->current_user->id)->get();
        }

        if ($req->ajax()) {
            return view('services.content', ['services' => $services]);
        }
        return view('services.index', ['services' => $services, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Show the details from an order.
     *
     */
    public function show_details(request $req)
    {
        $service = Service::find($req->id);

        if (!$service) {
            return response(['status' => 'error', 'msg' => 'Servicio no encontrado'], 200);
        }

        return $service;
    }
}
