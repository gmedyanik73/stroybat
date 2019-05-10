<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Session;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    //Делаем авторизацию по полю login вместо стандартного email
    public function username()
    {
        return 'login';
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required'
        ]);

        Session::put('last_message_for', 'login');
        if ($validator->fails()) {
            return redirect()->action('Auth\LoginController@showLoginForm')->withErrors($validator->messages());
        }

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            //$this->addNewWebsiteLogin($request, User::where('email', $request->input('email'))->pluck('id')->first(), "0");
            return redirect()->action('Auth\LoginController@showLoginForm')->withErrors('Упс, вы ввели неверные данные. Как так-то?!')->withColor('warning');
        }
        else
        {
            return redirect()->action('Site\IndexController@index');
        }

    }
    
    //Перенаправление на страницу логина после выхода пользователя из системы
    public function logout()
    {        
        Auth::logout();
        
        return redirect('/Index');
        return 'log';
    }
    
    public function showLoginForm()
    {
        $data = [
            'title' => 'Авторизация',
            'description' => 'Вход в систему',
            'categories' => Category::all()
        ];
       return view('site.login', $data);
    }
}
