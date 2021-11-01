<?php

namespace App\Response;

class Response {
  /**
   * Send Method Not Allowed code (405)
   */
  public static function sendMethodNotAllowedResponse(){
    http_response_code(405);
    die();
  }

  /**
   * Send Unauthorized code (401)
   */
  public static function sendUnauthorizedResponse(){
    http_response_code(401);
    die();
  }

  /**
   * Send Ok code (200)
   */
  public static function sendOkResponse(){
    http_response_code(200);
    die();
  }

  /**
   * Send Not Found code (404)
   */
  public static function sendNotFoundResponse(){
    http_response_code(404);
    die();
  }

  /**
   * Send JSON response (200)
   * @param mixed $data
   */
  public static function sendJsonResponse($data = null){
    header('Content-Type: application/json; charset=utf-8');

    if($data == null){
      http_response_code(204);
    }
    else{
      http_response_code(200);
      echo json_encode($data);
    }
    die();
  }

  /**
   * Send error response (500)
   * 
   * @param mixed $error
   */
  public static function sendErrorResponse($error = null){
    http_response_code(500);
    echo $error;
    die();
  }
}