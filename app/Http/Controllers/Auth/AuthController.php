<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    //
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $inputVal = $request->all();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            
            $request->session()->regenerate();

            if (auth()->user()->role == 1) {
                return redirect()->intended('halaman-pemilik')->with('alert', "Selamat Datang Admin"); //redirect()->route('haladmin')->with('alert', "Selamat Datang Admin");
            }else if (auth()->user()->role == 0) {
                return redirect()->intended('halaman-pemilik')
                ->with('alert', "Selamat Datang Pemilik"); //redirect()->route('halpemilik')->with('alert', "Selamat Datang Pemilik");
            }
            
        }else{
            return redirect()->route('login')
                ->with('alert','Email & Password are incorrect.');
        } 

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('halaman-admin')
        //         ->withSuccess('You have Successfully loggedin');
        // }

        // return redirect("login")->withError('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);


        return redirect("/")->withSuccess('Akun berhasil dibuat!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard1()
    {
        if (Auth::check()) {
            return view('.dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function Dashboard(){


    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
