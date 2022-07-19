<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VendorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('vendor')->check()) {
            if (!auth()->guard('vendor')->user()->email && auth()->guard('vendor')->user()->password) {
                return redirect()->route('getVendorLogin')->with('success', 'You Have To Be A Vendor');
            }
        }else {
            return redirect()->route('getVendorLogin')->with('error', 'You have to be logged in to access this page');
        }
        $response = $next($request);

        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')

            ->header('Pragma','no-cache')

            ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
