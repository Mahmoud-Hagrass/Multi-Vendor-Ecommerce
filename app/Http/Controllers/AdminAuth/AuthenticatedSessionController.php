<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\AdminAuth\LoginRequest ;
use App\Services\Auth\AuthService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    protected $authService ;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService ;
    }
    public function create(): View
    {
        return view('backend/admin/auth/login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $loggedin = $this->authService->login($request , 'admin') ;

        if(!$loggedin){
            return redirect()->back()->with([
                'message' => __('auth.failed'),
                'alert-type' => 'error',
            ]) ;
        }

        return redirect()->route('admin.index')->with([
            'message' => __('auth.login_successfully'),
            'alert-type' => 'success'
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
