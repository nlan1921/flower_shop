<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Nếu người dùng là admin, cho phép truy cập tất cả route
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Kiểm tra xem vai trò người dùng có nằm trong danh sách vai trò được phép hay không
        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        // Nếu không có vai trò nào khớp, chuyển hướng về trang chủ
        return redirect('/')->with('error', 'cannot accept.');
    }
}
