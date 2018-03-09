<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class GameletAPIController extends Controller
{
    /**
     * Handler when only username was requested, eg /jamiephan
     *
     * @param [string] $id
     * @return void
     */
    public function rootHandler($id){
        return response()->json(
            ["id" => $id,
            "message" => "Please specify the method.",
            "acceptableMethods" => $this->allowMethods,
            ], 200);
    }
    /**
     * Hander when method was called. If its allowedMethod, call its function name (kinda wonky zzz)
     *
     * @param [type] $id
     * @param [type] $method
     * @return void
     */
    public function methodHandler($id, $method){



        if(!in_array($method, $GLOBALS["GameletAPIHelper"]->allowMethods)){
            return response()->json(
                [
                    "error"=> "Invalid method.",
                    "acceptableMethods" => $GLOBALS["GameletAPIHelper"]->allowMethods,
                ]
            , 406);
        }
        $cache = \Request::get("cacheHTML");
        $isCache = \Request::get("validCache");

        $jsonArr = $GLOBALS["GameletAPIHelper"]->$method($id, $cache, $isCache);
         

        return response()->json($jsonArr, 200);
    }
}
