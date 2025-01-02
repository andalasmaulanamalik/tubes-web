<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $user = Auth::user();

        $request->session()->regenerate();

        if ($user->hasRole('kasir')) {
            return redirect()->route('penjualan');
        }
        
        if ($user->hasRole('manager')) {
            return redirect()->route('riwayatTransaksi');
        }

        if ($user->hasRole('gudang')) {
            return redirect()->route('produk.index');
        }

        if ($user->hasRole('supervisor')) {
            return redirect()->route('supervisor.index');
        }
        
        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
