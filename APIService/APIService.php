<?php

/* 
 * Copyright 2018 tacuchi.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json; charset=UTF-8");
include_once './Service/Business/boDistrito.php';


//GET
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $obj = new boDistrito();
    $result = $obj->Listar();
    if(empty($result)){
        response(200, "Service Not Found", NULL);
    }else{
        response(200, "Service Found", $result);
    }
}


function response($status, $status_message, $data){
    header("HTTP/1.1 ".$status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}