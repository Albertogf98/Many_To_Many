<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {

    public function getAdminHome() {
        $usersWithOrders = Order::with('users')->simplePaginate(2);
        return view('admin.home', ['usersWithOrders' => $usersWithOrders]);
    }

    public function getUserHome() {
        $orders = Order::with('users')->where('user_id', auth()->user()->id)->simplePaginate(2);
        return view('user.home', ['orders' => $orders]);
    }

    public function getCreate() {
        return view('generalViews.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'date' => 'required|before:tomorrow',
            'name' => 'required|max:255',
            'price' => 'required',
            'units' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        if (!empty($request) && $request->method() === 'POST') {
            DB::table('orders')->insert([
                'date' => $request->date,
                'name' =>$request->name,
                'price' => $request->price,
                'units' => $request->units,
                'image' => $request->image,
                'description' => $request->description,
                'user_id' => auth()->user()->id,
            ]);
            flash('Datos insertados')->success()->important();
            return redirect( auth()->user()->user_type . '/home');

        } else {
            flash('Error en al intentar insertar')->error()->important();
            return redirect('/');
        }
    }

    function getDelete($id) {
        if (empty($id)) {
            flash('Error el id no está')->error()->important();
            return  redirect( auth()->user()->user_type . '/home');
        } else {
           return view('admin.delete', ['id' => $id]);
        }
    }

    function delete(Request $request) {
        if (!empty($request->id) || $request->method() === 'DELETE') {

            DB::table('orders')->delete(['id' => $request->id]);

            flash('Borrado correctamente')->success()->important();
            return redirect( auth()->user()->user_type . '/home');
        } else {
            return redirect('/');
        }
    }
}
