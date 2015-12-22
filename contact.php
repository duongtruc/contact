<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$ROOT_URL='https://cstest.lvtn.xyz/api';
$search_url = '/requesters/search?';
$ticket_url = '/ticket/modify';
$auth = "Authorization: Bearer ndthelp@gmail.com:bf760bb00bf5ae26c3114d05c33b312d8b573185";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array($auth, 'Accept: application/json', 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$ROOT_URL.$search_url.'email='.$email);
$result = curl_exec($ch);
$result = json_decode($result, true);
if ($result && count($result['data'])) {
    $requester = $result['data'][0];
    $requester_id = $requester['_id'];
    $ticket = json_encode(array(
        'ticket'    => array(
            'subject'       => $subject,
            'description'   => $message,
            'requester_id'  => $requester_id
        )
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_URL,$ROOT_URL.$ticket_url);
    $result = curl_exec($ch);
    echo $result;
} else {
    $requester = json_encode(array(
        'requester'    => array(
            'first_name'  => $first_name,
            'last_name'   => $last_name,
            'email'       => $email
        )
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requester);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_URL,$ROOT_URL.'/api/requester/add');
    $result = json_decode(curl_exec($ch), true);
    //var_dump($result);
    $requester = $result['data'];
    $requester_id = $requester['_id'];
    $ticket = json_encode(array(
        'ticket'    => array(
            'subject'       => $subject,
            'description'   => $message,
            'requester_id'  => $requester_id
        )
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_URL,$ROOT_URL.$ticket_url);
    $result = curl_exec($ch);
    echo $result;
}
curl_close ($ch);
?>
<h3>
    Thanks for your infomation, we'll contact you back as soon as possible
</h3>
