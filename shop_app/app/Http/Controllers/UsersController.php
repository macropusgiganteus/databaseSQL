<?php

namespace App\Http\Controllers;

use App\Employees;
use App\User;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        //
    }

    public function login(Request $request)
    {
        if (User::where('employeeNumber', $request->input('employeenumber'))->exists()) {
            $password = User::select('password')->where('employeeNumber', $request->input('employeenumber'))->first()->password;
            $decrypted = Crypt::decryptString($password);
            if ($decrypted == $request->input('password')) {
                return redirect()->route('product.index');
            }
        }

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
