<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function prosesloginadmin(Request $request)
    {
        if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/panel/dashboardadmin');
        } else {
            //$pass = 123;
            //echo Hash::make($pass);
            //Hash::make('123');
            //= "$2y$10$GepN6CP3AcloKXUglciQueo2m2/b0AYUhvHhE4hF6EJb4JS6IEtmO
            return redirect('/panel')->with(['warning' => 'Email atau Password Salah!']);
        }
    }

    public function proseslogin(Request $request)
    {
        //$credentials = $request->only('nisn', 'password');

        //Debugging
        //dd($credentials);
        if(Auth::guard('murid')->attempt(['nisn' => $request->nisn, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            //$pass = 123;
            //echo Hash::make($pass);
            return redirect('/')->with(['warning' => 'NISN / Password Salah!']);
        }
    }

    // public function proseslogin(Request $request)
    // {
    //     // Cari user berdasarkan email
    //     $user = \App\Models\Murid::where('nisn', $request->nisn)->first();

    //     // Jika user ditemukan, login tanpa password
    //     if ($user) {
    //         Auth::login($user);  // Login langsung tanpa password
    //         return redirect('/dashboard');
    //     } else {
    //         return redirect('/')->with(['warning' => 'NISN / Password Salah!']);
    //     }

    // }

    public function proseslogout()
    {
        if(Auth::guard('murid')->check()){
            Auth::guard('murid')->logout();
            return redirect('/');
        }
    }

    public function proseslogoutadmin()
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/panel');
        }
    }
}
