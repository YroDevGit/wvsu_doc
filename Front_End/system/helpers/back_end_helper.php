<?php
defined('BASEPATH') OR exit('No direct script access allowed');



// API for back_end
if(! function_exists("API")){
    function API($url){
       return API.$url;
    }
}

// separated classname and function name. we can use API_NAME("classname", "functionname");
if(! function_exists("API_NAME")){
   function API_NAME($class, $name="", $parameters=null){
      $nn = $name;
      if($name=="" || $name == null){
         $nn = "";
      }
      else{
         $nn = "/".$name;
      }
      $ret = null;
      if($parameters==null){
         $ret = API.$class.$nn;
      }
      else{
         $ret = API.$class.$nn."?".$parameters;
      }
      return $ret;
   }
}

//Global api
if(! function_exists("API_URL")){
   function API_URL($url){
      return $url;
   }
}


if(! function_exists("API_REQUEST")){
   function API_REQUEST($api, $parameters=[], $type = "PHP"){
      include "Front_End\APIKEY.php";
      $ret  = null;
      $ch = curl_init($api);
      $parameters = json_encode($parameters);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if(!empty($parameters)){
         curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($parameters),
            'API_KEY: '.YRO_API_KEY_FE
        ]);

        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($curl_error) {
         return ['error' => $curl_error];
         exit;
         }

        switch($type){
         case "PHP": $ret = json_decode($response, true); break;
         case "JS": $ret = $response; break;
        }
        
        return $ret;
   }
}

if(! function_exists("GLOBAL_POST_API")){
   function GLOBAL_POST_API($url, $data=[], $headers=[]){

   $curl = curl_init();

   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_POST, true);
   if(! empty($data)){
      if (in_array('Content-Type: application/json', $headers)) {
         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
      }else{
         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      }  
   }
   
   if(! empty($headers)){
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
   }
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);


   $response = curl_exec($curl);


   if(curl_errno($curl)) {
      echo 'Curl error: ' . curl_error($curl);
   }

   curl_close($curl);

   return json_decode($response, true);
      }
   }


   if(! function_exists("GLOBAL_FETCH_API")){
      function GLOBAL_FETCH_API($url){
         $url = $url;
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

         $response = curl_exec($ch);

         curl_close($ch);

         $data = json_decode($response, true);
         $ret = ["error"=>"error"];

         if ($data) {
            $ret = $data;
         }

         return $ret;
      }
   }
?>