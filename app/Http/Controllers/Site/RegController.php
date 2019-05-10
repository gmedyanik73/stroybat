<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Category;
use App\Cart;
use Validator;

class RegController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/Index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
            'password_confirmation' => 'min:3|same:password',
        ]);
        if ($validator->fails()) {
           return redirect()->action('Site\RegController@showRegisterForm')->withErrors($validator->messages());
        }
        else {
            $user = User::create([
                'login' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            return redirect()->action('Auth\LoginController@showLoginForm');
        }


    }

    public function showRegisterForm()
    {
        $data = [
            'title' => 'Регитрация',
            'description' => 'Регистрация в магазине',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('site.register', $data);
    }
}
