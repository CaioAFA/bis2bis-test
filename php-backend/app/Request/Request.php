<?php

namespace App\Request;

class Request {
  /**
   * Retrieve the request payload data
   * 
   * @return mixed
   */
  public static function getPayload(){
    $request_body = file_get_contents('php://input');
    return json_decode($request_body, true);
  }
}