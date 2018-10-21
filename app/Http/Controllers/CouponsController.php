<?php

namespace App\Http\Controllers;

use \App\Coupon;
use \App\CouponRecord;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $title = $menu = "coupons";
        $coupons = Coupon::orderBy('id', 'desc')->get();

        if ($req->ajax()) {
            return view('coupons.table', ['coupons' => $coupons]);
        }
        return view('coupons.index', ['coupons' => $coupons, 'menu' => $menu , 'title' => $title]);
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario";
        $menu = "Cupones";
        $coupon = null;
        if ($id) {
            $coupon = Coupon::find($id);
        }
        return view('coupons.form', ['coupon' => $coupon, 'menu' => $menu, 'title' => $title]);
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $coupon = New Coupon;

        $exist = Coupon::where('business_id', auth()->user()->business->id)->where('code', $req->code)->first();

        if ($exist) { return response(['msg' => 'El código del cupón debe ser único, por favor, trate con uno distinto', 'status' => 'error'], 400); }

        $coupon->business_id = auth()->user()->business->id;
        $coupon->code = $req->code;
        $coupon->type = 2;//Change this
        $coupon->description = $req->description;
        $coupon->percentage = $req->percentage;//It maybe can be null

        $coupon->save();

        return response(['msg' => 'Cupón registrado correctamente', 'url' => url('cupones'), 'status' => 'success'], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $coupon = Coupon::find($req->id);

        if (!$coupon) { return response(['msg' => 'ID de cupón no encontrado', 'status' => 'error'], 404); }

        $exist = Coupon::where('business_id', auth()->user()->business->id)
        ->where('code', $req->code)
        ->where('code', '!=', $req->old_code)
        ->first();

        if ($exist) { return response(['msg' => 'El código del cupón debe ser único, por favor, trate con uno distinto', 'status' => 'error'], 400); }

        $coupon->code = $req->code;
        $coupon->type = 2;//Change this
        $coupon->description = $req->description;
        $coupon->percentage = $req->percentage;//It maybe can be null

        $coupon->save();

        return response(['msg' => 'Cupón modificado correctamente', 'url' => url('cupones'), 'status' => 'success'], 200);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $msg = count($req->ids) > 1 ? 'los cupones' : 'el cupón';
        $coupons = Coupon::whereIn('id', $req->ids)
        ->get();
        //->update(['status' => $req->status]);

        if ($coupons) {
            foreach ($coupons as $coupon) {
                if (count($coupon->records)) {
                    foreach ($coupon->records as $record) {
                        $record->delete();//Erase record
                    }
                }
            }
            Coupon::whereIn('id', $req->ids)->delete();//Need to be retrieved again to delete the coupon.
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url('cupones'), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url('cupones')], 404);
        }
    }
}
