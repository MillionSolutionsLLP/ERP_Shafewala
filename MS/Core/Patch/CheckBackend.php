<?php

namespace MS\Core\Patch;

use Closure;

class CheckBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   

        if(!$request->session()->has('user')){
           
           return redirect()->action("\B\Users\Controller@login_form");
           // return back()->withInput();
                 
        }
       //dd($request->session()->get('user'));
        if(!$request->session()->get('user')['OV']){
           
           return redirect()->action("\B\Users\Controller@login_form_otp");
           // return back()->withInput();
     
        }

        return $next($request);
    }
}
