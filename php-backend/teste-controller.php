<?php

session_start();

echo print_r($_SESSION, true);

if(isset($_SESSION["newsession"])){
  $_SESSION["newsession"] = $_SESSION["newsession"] . 'def';
}
else{
  $_SESSION["newsession"] = 'abc ';
}

echo $_SESSION["newsession"];