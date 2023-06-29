<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\CustomerHelper;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function showLogin(){
        if (auth()->guard('user')->check()) {
            return redirect()->route('customer.projects');
        }
        $data['title'] = CustomerHelper::getPageTitle('ログイン');

        return view('customer.auth.login')->with(['data' => $data]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (!auth()->guard('user')->attempt($credentials)) {
            toastr(trans('auth.failed'), 'error');
            return redirect()->back()->withInput();
        }

        return redirect()->route('customer.projects');
    }

    public function logout(): RedirectResponse
    {
        auth()->guard('user')->logout();

        return redirect()->route('customer.login');
    }
}
