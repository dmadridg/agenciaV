<?php

namespace App\Http\Controllers;

use \App\Card;
use \App\User;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = "Mis tarjetas";
        $menu = "Tarjetas";

        $cards = Card::where('user_id', $this->current_user->id)
        ->get();

        if ($req->ajax()) {
            return view('cards.table', ['cards' => $cards]);
        }
        return view('cards.index', ['cards' => $cards, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Users";
        $card = null;

        if ($id) {
            $card = User::find($id);
        }
        return view('cards.form', ['card' => $card, 'menu' => $menu, 'title' => $title]);
    }

    /*
    * Add a car to the current user
    */
    public function save(Request $req) {
        $user = User::user_by_id($this->current_user->id);
        if ( $user->conekta_customer_id ) {
            $customer = \Conekta\Customer::find($user->conekta_customer_id);
            if ( $customer ) {
                $source = $customer->createPaymentSource(array(
                    'token_id' => $req->card_token,
                    'type'     => 'card'
                ));

                return $this->new_card($user->id, $req->card_type, $req->last4, $source->id);
            }
        } else {
            try {
                $customer = \Conekta\Customer::create(//Creates the customers and add a new card
                    array(
                        "name" => $user->name,
                        "email" => $user->email,
                        "phone" => $user->phone,
                        "payment_sources" => array(
                            array(
                                "type" => "card",
                                "token_id" => $req->card_token,
                            )
                        )//payment_sources
                    )//customer
                );

                $user->conekta_customer_id = $customer->id;
                $user->save();

                return $this->new_card($user->id, $req->card_type, $req->last4, $customer->payment_sources[0]->id);

            } catch (\Conekta\ErrorList $errorList) {
                $msg_errors = '';
                foreach ($errorList->details as &$errorDetail) {
                    $msg_errors .= $errorDetail->getMessage();
                }
                return response(['msg' => 'Datos del cliente incorrectos: '.$msg_errors, 'status' => 'error']);
            }
        }
        return response(['msg' => 'Ha ocurrido un error desconocido', 'status' => 'error'], 500);
    }

    /*
    * Delete a card from a conekta customer
    */
    public function delete(Request $req) {
        $user = User::find($this->current_user->id);
        $cards = Card::whereIn('id', $req->ids)->get();

        if(!count($cards)){ return response([ 'msg' => 'Tarjeta no encontrada', 'status' => 'error'], 404); }
        if(!$user){ return response([ 'msg' => 'Usuario no encontrado', 'status' => 'error'], 404); }
        
        $customer = \Conekta\Customer::find($user->conekta_customer_id);
        if ($customer) {
            foreach($customer->payment_sources as $key => $c) {
                foreach ($cards as $card) {
                    if ( $card->last_digits == $c->last4 ) {
                        $customer->payment_sources[$key]->delete();
                        Card::where('token', $c->id)->where('user_id', $this->current_user->id)->delete();
                        return response(['msg' => "La tarjeta **** **** **** $card->last_digits ha sido eliminada", 'status' => 'success', 'url' => url('my-cards'), 'refresh' => 'table'], 200);
                    }
                }
                    
            }
            return response([ 'msg' => "No se encontró ninguna tarjeta con los digitos **** **** **** **** $card->last_digits", 'status' => 'error'], 404);
        } else {
            return response([ 'msg' => 'Cliente no encontrado', 'status' => 'error'], 404);
        }
    }

    /**
     * Save a new card.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_card($user_id, $card_type, $last4, $token)
    {
        $card = New Card;

        $card->user_id = $user_id;
        $card->type = $card_type;
        $card->last_digits = $last4;
        $card->token = $token;

        $card->save();

        return response(['url' => url('my-cards'), 'refresh' => 'table', 'status' => 'success', 'msg' => 'Nueva tarjeta registrada correctamente'], 200);
    }
}
