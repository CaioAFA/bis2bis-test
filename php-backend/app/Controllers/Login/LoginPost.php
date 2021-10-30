<?php

namespace App\Controllers\Login;

use App\Request\Request;

session_start();

class LoginPost {
  public function execute(){
    $data = Request::getPayload();
    echo print_r($data, true);
  }
}