<?php
$host="localhost";
$user="root";
$password="";
$db="raspy";
$con = new mysqli($host,$user,$password,$db);

  $ip = getUserIP();
  $browser = $_SERVER['HTTP_USER_AGENT'];
  $dateTime = date('Y/m/d G:i:s');
  $file = "visitors.html";
  $file = fopen($file, "a");
  $data = "<pre><b>User IP</b>: $ip <b> Navegador</b>: $browser <br> Dato : $dateTime <br></pre>";
  fwrite($file, $data);
  fclose($file);
  function getUserIP()
  {
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];
      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }
      return $ip;
  }
?>
