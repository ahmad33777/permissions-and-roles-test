<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{

    // to show login laget
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:3',
                'remember' => 'boolean'
            ],
            [
                'email.required' => 'رجاء إدخل البريد الإلكتروني ',
                'email.email' => 'البريدج المدخل غير صحيح',
                'password.required' => 'الرجاء , ادخل كلمة  المرورو ',

            ]
        );

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (!$validator->fails()) {
            if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
                return response()->json(['message' => 'logged in successfully '], 200);
                Auth()->user->assignRole('admin');
            } else {
                return response()->json(['message' => 'Error credentials '], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function editProfile()
    {
    }
    public function updateProfile()
    {
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate(); // لابطال الجلسة
        return redirect()->route('cms.login');
    }
}