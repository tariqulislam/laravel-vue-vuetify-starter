<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Operator;

class CheckApi
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
        $saveOperator = Operator::where($request->input('api_token'));
        if($saveOperator->count() >=1) {
            $getOperator = $saveOperator->first();
            if($getOperator->api_token != "") {       
                return $next($request);
            } else {
               return response()->json(['output' => 'error', 'statusCode' => 401, 'message' => 'Unauthorized Access for user'], 401);
            }
        } else {
            return response()->json(['output' => 'error', 'statusCode' => 401, 'message' => 'Unauthorized Access for user'], 401);
        }
    }
}
