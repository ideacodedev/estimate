<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin;
use App\Models\tbl_user;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'username' => 'required',
        ], [
            'username' => 'กรุณากรอก Username',
            'password' => 'กรุณากรอก Password',
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'เข้าสู่ระบบเรียบร้อย');
        } elseif (auth()->guard('officers')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'เข้าสู่ระบบเรียบร้อย');
        } elseif (auth()->guard('students')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'เข้าสู่ระบบเรียบร้อย');
        } elseif (auth()->guard('lecs')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'เข้าสู่ระบบเรียบร้อย');
        } else {
            return redirect()->route('welcome')->with('error', 'Username หรือ Password ไม่ถูกต้อง!');
        }
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'ออกจากระบบเรียบร้อย');
    }
}
