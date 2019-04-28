<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class navigateMiddleware
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
        $current_url=url()->current();
        // if(strpos($current_url,'/fuer/')!==false){
        //     $str_place=strpos($current_url,'fuer/');
        //     $newStr=str_replace(substr($current_url,$str_place,7),'',$current_url);
        //     return redirect($newStr);
        // }
        if(isset($_GET['key']) && isset($_GET['source'])){
            $sendClick=DB::table('fe_users')->where('password',$_GET['key'])->update(['click_email'=>1]);
        }
        $header=$request->header('allowNavigate');
        if(!isset($_GET['navigate'])){
            //$request['data']=app('\App\Http\Controllers\mainController')->getDynamicIndex();
            $request['isNavigate']=0;
        }else{
            if($header!=null){
                $request['data']=app('\App\Http\Controllers\mainController')->getData();
                $request['isNavigate']=1;
            }else{
                $request['isNavigate']=0;
                // return redirect(url()->current());
            }
        }
        return $next($request);
    }
}
