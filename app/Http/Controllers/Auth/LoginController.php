<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        // Tampung Inputan
        $input = $request->all();
     
        // Validasi Inputan
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Optional Remember Me
        $remember = $input['remember'] ?? false;
        
     
        // Login dan Redirect Sesuai Role
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), $remember))
        {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/home')->with('pesan', 'Berhasil Login');
            }else{
                return redirect('/user/home')->with('pesan', 'Berhasil Login');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

}
