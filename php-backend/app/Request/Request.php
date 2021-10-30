<?php

namespace App\Request;

class Request {
  public static function getPayload(){
    $request_body = file_get_contents('php://input');
    return json_decode($request_body, true);
  }
}