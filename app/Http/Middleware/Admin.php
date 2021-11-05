<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Admin
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
        if(auth()->user()->id_staff==999){
            return $next($request); 
            
        }
   
        return redirect()->route('lecturer.profile.edit')->with('error','You tried to access a page that only COORDINATOR can!');
    
    }
}
