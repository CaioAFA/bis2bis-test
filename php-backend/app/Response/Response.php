<?php

namespace App\Response;

class Response {
  public static function sendMethodNotAllowedResponse(){
    http_response_code(405);
    die();
  }

  public static function sendUnhauthorizedResponse(){
    http_response_code(401);
    die();
  }

  public static function sendOkResponse(){
    http_response_code(200);
    die();
  }

  public static function sendJsonResponse($data){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
  }
}