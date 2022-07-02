<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        
        // Cek Role
        if(auth()->user()->role == $userType){
            return $next($request);
        } else {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/home')->with('status', 'Tidak Punya Permission !');
            }else{
                return redirect('/user/home')->with('status', 'Tidak Punya Permission !');
            }
        }
          
        // return redirect('/'.$userType.'/home')->with('status', 'Tidak Punya Permission !');
        // return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */

        
    }
}
