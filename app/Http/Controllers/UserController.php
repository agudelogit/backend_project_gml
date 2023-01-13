<?php

namespace App\Http\Controllers;

use App\Mail\notificationAdminMailable;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\notificationMailable;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->orderBy('id')->get();
        return $users;
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->nombre        = $request->nombre;
        $user->apellido      = $request->apellido;
        $user->cedula        = $request->cedula;
        $user->email         = $request->email;
        $user->pais          = $request->pais;
        $user->direccion     = $request->direccion;
        $user->celular       = $request->celular;
        $user->category_id   = $request->category_id;

        $admin = $this->show(1);

        if( $user->save() == 1 ){
            $mail = $request->email;
            $this->sendMail( $mail );
            $this->sendMailAdmin( $admin->email );
            return 1;
        }

        return 2;
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = user::findOrFail($request->id);

        $user->nombre        = $request->nombre;
        $user->apellido      = $request->apellido;
        $user->cedula        = $request->cedula;
        $user->email         = $request->email;
        $user->pais          = $request->pais;
        $user->direccion     = $request->direccion;
        $user->celular       = $request->celular;
        $user->category_id   = $request->category_id;

        return $user->save();       
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function sendMail( $mail ){
        $correo = new notificationMailable;
        Mail::to($mail)->send($correo);
    }

    public function sendMailAdmin( $mail ){
        $correo = new notificationAdminMailable;
        Mail::to($mail)->send($correo);
    }
}
