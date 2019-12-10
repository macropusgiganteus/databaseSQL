<?php

namespace App\Http\Controllers;

use App\Employees;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{

    public function index()
    {
        return view('login.login');
    }

    public function create(Request $request)
    {
        if (Employees::where('employeeNumber', $request->input('employeenumber'))->exists()) {
            if (User::where('employeeNumber', $request->input('employeenumber'))->exists()) {
                ///
            } else {
                $encrypted = Crypt::encryptString($request->get('password'));
                $user = new User([
                    'employeeNumber' => $request->input('employeenumber'),
                    'password' => $encrypted,
                ]);
                $user->timestamps = false;
                $user->save();

            }
        }
        return redirect()->route('users.index');
    }

    public function login(Request $request)
    {
        if (User::where('employeeNumber', $request->input('employeenumber'))->exists()) {
            $password = User::select('password')->where('employeeNumber', $request->input('employeenumber'))->first()->password;
            $decrypted = Crypt::decryptString($password);
            $jobTitle = Employees::select('jobTitle')->where('employeeNumber', $request->input('employeenumber'))->first()->jobTitle;
            $employeeNumber = Employees::select('employeeNumber')->where('employeeNumber', $request->input('employeenumber'))->first()->employeeNumber;

            if ($decrypted == $request->input('password')) {
                // Cookie::queue(Cookie::make('jobtitle', $jobTitle, 60));
                $cookieJob = cookie('jobtitle', $jobTitle, 60);
                $cookieEmp = cookie('employeeNumber', $employeeNumber, 60);
                $cookieLogin = cookie('layout', '_Login', 60);
                return redirect()->route('product.index')->cookie($cookieJob)
                    ->cookie($cookieEmp)->cookie($cookieLogin);
            }
        }

        return redirect()->route('users.index');
    }

    public function logout()
    {
        return redirect()->route('product.index')
            ->withCookie(Cookie::forget('jobtitle'))
            ->withCookie(Cookie::forget('employeeNumber'))
            ->withCookie(Cookie::forget('layout'));
    }

}
