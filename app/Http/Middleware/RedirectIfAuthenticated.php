<?php

namespace App\Http\Middleware;

use App\Enums\RoleType;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->getRoleNames()->first();

                switch ($role) {
                    case RoleType::SUPER_ADMIN():
                        return '/account/super-admin/dashboard';
                        break;
                    case RoleType::ADMIN():
                        return redirect('/account/admin/dashboard');
                        break;
                    case RoleType::DOCTOR():
                        return redirect('/account/doctor/dashboard');
                        break;
                    case RoleType::HOSPITAL():
                        return redirect('/account/hospital/dashboard');
                        break;
                    case RoleType::PET_OWNER():
                        return redirect('/');
                        break;

                    default:
                        return '/';
                        break;
                }
            }
        }

        return $next($request);
    }
}
