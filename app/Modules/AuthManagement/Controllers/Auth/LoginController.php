<?php

namespace App\Modules\AuthManagement\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\AuthManagement\Requests\checkCredentail;
use App\Modules\AuthManagement\Services\Interfaces\LoginServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $loginService;
    public function __construct(LoginServiceInterface $loginService)
    {
        $this->middleware('guest')->except('logout');
        $this->loginService = $loginService;
    }

    protected function authenticated(Request $request, $user)
    {
        $role = DB::table('roles')->where('id', $user->role_id)->first();
        if ($user->role_id == $role->id) {
            return redirect()->route('adminLayout')->with('success', 'Welcome To Admin Login');
        } else {
            return redirect('/')->with('status', 'Login Successful');
        }
    }

    public function showLoginForm()
    {
        return view('AuthManagement::auth.login');

    }

    public function login(checkCredentail $request)
    {
        try {
            $type = false;// false  is for web user
            $result = $this->loginService->checkLoginCredential($request, $type);

            if ($result['status'] === 'success') {
                return redirect()->route('adminLayout')->with($result['message']);
            } else {
                return redirect()->back()
                    ->withInput() // this keeps old input like name and remember
                    ->withErrors(['name' => $result['message']]);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
