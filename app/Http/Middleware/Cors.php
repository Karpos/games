<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Response;
class Cors {
    public function handle($request, Closure $next)
    {

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        //apply cors only to api routes

        /*if(Request::segment(1)=='api') {

            header("Access-Control-Allow-Origin: *");


            // ALLOW OPTIONS METHOD
            $headers = [
                'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
                'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin, Authorization'
            ];
            if($request->isMethod("OPTIONS")) {
                // The client-side application can set only headers allowed in Access-Control-Allow-Headers
                return Response::make('OK', 200, $headers);
            }

            $response = $next($request);
            foreach($headers as $key => $value){
                $response->header($key, $value);
            }
        }else{

            $response = $next($request);
        }
        return $response;*/
    }
}