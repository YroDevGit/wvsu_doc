<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(! function_exists("API_INPUT")){
    function API_INPUT(){
        $input = json_decode(get_instance()->input->raw_input_stream, true);
        return $input;
    }
}

if(! function_exists("STATUS_RESPONSE")){
    function STATUS_RESPONSE($result, $direct=false){
      
       if(is_array($result)){
        $ret = [
            "status" => 200,
            "message" => "SUCCESS",
            "data" => $result,
            "text" => "Has Data"
        ];
       }
       else{
        if($result=="ERROR"){
            $ret = [
                "status" => -1,
                "message" => "ERROR",
                "data" =>[],
                "text" => $result
            ];
        } else if($result=="NOTUSER"){
            $ret = [
                "status" => 401,
                "message" => "NOT AUTHORIZED USER, Please check API KEY",
                "data" =>[],
                "text" => $result
            ];
        }
        else{
            $ret = [
                "status" => 200,
                "message" => "SUCCESS",
                "data" =>[],
                "text" => $result
            ];
        } 
       }
       if($direct==false){return json_encode($ret);exit;}
       if($direct==true){echo json_encode($ret);exit;}
    }
}

if(! function_exists("BACKEND_RESPONSE")){
    function BACKEND_RESPONSE(array $value, bool $direct=true){
        /** => Json / js array
         * create back_end api response.
         */
        if($direct == false){
            return json_encode($value); exit;
        }
        else{
            echo json_encode($value); exit;
        }
    }
}

if(! function_exists("API_RESPONSE")){
    function API_RESPONSE(array $value, bool $direct=true){
        /** => Json / js array
         * create back_end api response.
         */
        if($direct == false){
            return json_encode($value); exit;
        }
        else{
            echo json_encode($value); exit;
        }
    }
}

if(! function_exists("RESPONSE_DATA")){
    function RESPONSE_DATA(int $code, string $status, string $message, array $data=[]){
        /** ==> Array
         * set to json response.
         */
        return ["code" => $code, "status" => $status, "message" => $message, "data" => $data];
    }
}

if(! function_exists("JSON_RESPONSE_DATA")){
    function BACKEND_RESPONSE_DATA(int $code, string $status, string $message, array $data = []){
        /** ==> json response
         * json response with simple data, just code, status and message.
         */
        API_RESPONSE(RESPONSE_DATA($code, $status, $message, $data));
    }
}

if(! function_exists("API_RESPONSE_DATA")){
    function API_RESPONSE_DATA(int $code, string $status, string $message, array $data = []){
        /** ==> json response
         * json response with simple data, just code, status and message.
         */
        API_RESPONSE(RESPONSE_DATA($code, $status, $message, $data));
    }
}
?>