<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra: đã đăng nhập VÀ là Admin (role == 1)
        if (auth()->check() && auth()->user()->role == 1) {
            return $next($request);
        }

        // Không phải Admin -> chuyển hướng về trang chủ
        return redirect('/')->with('error', 'Bạn không có quyền truy cập!');
    }
}
