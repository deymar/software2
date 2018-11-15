<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Area;
use Auth;

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
    protected $redirectTo = '/Personal';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }

    public function loginPersonal()
    {
        $areas = Area::getAreas();   
        return view('login.loginPersonal', ["areas" => $areas]);
    }

    public function loginCliente()
    {
       
        return view('login.loginCliente');
    }

    public function validarLoginPersonal()
    {
        $req = request();

        $this->validate($req,
                [   'usuario' => 'required|string',
                    'password' => 'required|string',
                    'area' => 'required|integer'
                ]);
        
        return $this->autenticarPersonal();
        // return "todo bien Usuario ".$user." pass ".$pass." area ".$area;
    }
    public function validarLoginCliente()
    {
        $req = request();
        $this->validate($req,
                [   'usuario' => 'required|string',
                    'password' => 'required|string',
                ]);
        
        return $this->autenticarCliente();
    }
    

    public function autenticarPersonal()
    {
        $req = request();
        $user = $req->input('usuario');
        $pass = $req->input('password');
        $area = $req->input('area');

        $auth = Auth::guard('personal')->attempt(['id_area' => $area,'user_name' => $user, 'password' => $pass]);
        
        if($auth){

            return redirect()->route('PersonalPrincipal');
        }else{
            return back()
                    ->with('error', 'Login Incorrecto , verifique el formulario');
        }
    }
    public function autenticarCliente()
    {
        $req = request();
        $user = $req->input('usuario');
        $pass = $req->input('password');
        $auth = Auth::guard('huesped')->attempt(['user_name' => $user, 'password' => $pass]);
        

        if($auth){

            return redirect()->route('principalHuesped');
        }else{
            return back()
                    ->with('error', 'Login Incorrecto , verifique el formulario');
        }
    }


    public function logout()
    {
        if(Auth::guard('personal')->check()){
            Auth::guard('personal')->logout();
        }elseif (Auth::guard('huesped')->check()) {
            Auth::guard('huesped')->logout();
        }else{
            Auth::logout();
        }
        request()->session()->flush();
        return redirect()->route('principal');
    }

    // public function username()
    // {
    //     return 'user_name';
    // }

    // public function authenticated()
    // {
    //     return redirect()->route('home');
    // }
   
}
