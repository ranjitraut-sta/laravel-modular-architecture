<?php

namespace App\Modules\AuthManagement\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Modules\AuthManagement\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    protected $authService;
    protected string $view = 'auth.';

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function showLinkRequestForm()
    {
        return view($this->view . 'passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $result = $this->authService->sendResetLink($request->email);
        if ($result) {
            return back()->with('success', 'We have e-mailed your password reset link!');
        }else {
            return back()->withErrors(['email' => 'We can\'t find a user with that e-mail address.']);
        }
    }
}
