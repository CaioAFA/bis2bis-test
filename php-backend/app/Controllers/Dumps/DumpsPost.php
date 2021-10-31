<?php

namespace App\Controllers\Dumps;

use App\Response\Response;
use App\Session\Session;

class DumpsPost {
  public function execute(){
    if(!Session::canManageDumps()){
      Response::sendUnhauthorizedResponse();
    }
    
    $dumpsDir = __DIR__ . '/../../../dumps';
    
    $HOST = \App\Env\Env::$DB_HOST;
    $NAME = \App\Env\Env::$DB_NAME;
    $USER = \App\Env\Env::$DB_USER;
    $PASS = \App\Env\Env::$DB_PASS;

    $date = date('Y-m-d_h:i:s');

    $command = "mysqldump -h $HOST -u'$USER' -p'$PASS' $NAME > $dumpsDir/$date.sql"; 
    $output = null;
    $retval = null;

    if($retval != 0){
      Response::sendErrorResponse($output);
    }

    exec($command, $output, $retval);

    Response::sendOkResponse();
  }
}