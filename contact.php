<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$ROOT_URL='https://cstest.lvtn.xyz/api';
$search_url = '/requesters/search?';
$auth = "Authorization: Bearer ndthelp@gmail.com:bf760bb00bf5ae26c3114d05c33b312d8b573185";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array($auth, 'Accept: application/json'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$ROOT_URL.$search_url.'email='.$email);
$result = curl_exec($ch);
var_dump($result);
echo $result['is_error'];
curl_close ($ch);
?>
<h3>
    Thanks for your infomation, we'll contact you back as soon as possible
</h3>
