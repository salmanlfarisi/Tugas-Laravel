<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Contoh cek role admin, sesuaikan dengan cara kamu menyimpan role user
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json([
                'status' => false,
                'message' => 'Akses hanya untuk admin'
            ], 403);
        }

        return $next($request);
    }
}
