<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username='ndthelp@gmail.com';
$token='bf760bb00bf5ae26c3114d05c33b312d8b573185';
$URL='https://cstest.lvtn.xyz/api/requesters/search?email=duongtruc.92@gmail.com';
$auth = "Authorization: Bearer ndthelp@gmail.com:bf760bb00bf5ae26c3114d05c33b312d8b573185";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $auth));
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);//get status code
$result=curl_exec ($ch);
var_dump($result);
curl_close ($ch);
?>
<h3>
    Thanks for your infomation, we'll contact you back as soon as possible
</h3>
