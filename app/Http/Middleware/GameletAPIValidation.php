<?php

namespace App\Http\Middleware;

use Closure;
class GameletAPIValidation
{
    /**
     * Validate whether a user exist in Gamelet.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $id = $request->route()->parameters["id"];
        $method = isset($request->route()->parameters["method"]) ? $request->route()->parameters["method"] : "info";
        $validCache = false;


        if(!in_array($method, $GLOBALS["GameletAPIHelper"]->allowMethods)){
            return response()->json(
                [
                    "error"=> "Invalid method.",
                    "acceptableMethods" => $GLOBALS["GameletAPIHelper"]->allowMethods,
                ]
            , 406);
        }

        if($request->cache == 1){
            if(!$GLOBALS["GameletAPIHelper"]->isUserInCache($id, $method)){
                // return response()->json([
                //     "error" => "User {$id} was not found in cache."
                // ], 404);
                $validCache = false;
            } else {
                $validCache = true;
            }
        } else {

            $method = in_array($method, $GLOBALS["GameletAPIHelper"]->allowMethods) ? $method : "info";
            $ch = curl_init();
            $headers["User-Agent"] = "GameletAPI/2.0";
            $url = $GLOBALS["GameletAPIHelper"]->MethodsURL[$method] . $id;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $data = curl_exec($ch);
            curl_close($ch);

            if($data == "") { //Gamelet will return 200 OK with a blank page if user not exist...I don't know why zzz
                
                return response()->json([
                    "error" => "User {$id} not found."
                ], 404);

            }

            $request->attributes->add(['cacheHTML' => $data]);
        }

        $request->attributes->add(["validCache" => $validCache]);
        return $next($request);
    }
}
