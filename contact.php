<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username='ndthelp@gmail.com';
$token='bf760bb00bf5ae26c3114d05c33b312d8b573185';
$URL='https://cstest.lvtn.xyz/api/requesters/search?email=duongtruc.92@gmail.com';
$auth = "Authorization: Bearer ndthelp@gmail.com:bf760bb00bf5ae26c3114d05c33b312d8b573185";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($auth));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec ($ch);
echo curl_getinfo($ch) . '<br/>';
echo curl_errno($ch) . '<br/>';
echo curl_error($ch) . '<br/>';
var_dump($result);
curl_close ($ch);
?>
<h3>
    Thanks for your infomation, we'll contact you back as soon as possible
</h3>
