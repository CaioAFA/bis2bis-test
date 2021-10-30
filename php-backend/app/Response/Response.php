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
}