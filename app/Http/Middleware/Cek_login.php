<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // JS 9 Praktikum No 3
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // check if already logged in. if not, redirect to login page
        if (!Auth::check()) {
            return redirect('login');
        }

        // simpan data user pada variabel user
        $user = Auth::user();

        // jika user memiliki level sesuai pada kolom lanjutkan request
        if($user->level_id == $roles) {
            return $next($request);
        }

        // jika tidak memiliki akses kembalikan ke halaman login
        return redirect('login')->with('error', 'Maaf anda tidak memiliki akses');
    }
}