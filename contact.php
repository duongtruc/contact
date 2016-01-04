<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$ROOT_URL='https://cstest.cskhlvtn.xyz/api';
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
    curl_setopt($ch, CURLOPT_URL,$ROOT_URL.'/requester/add');
    $result = json_decode(curl_exec($ch), true);
    $requester = $result['data'];
    $requester_id = $requester['id'];
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
}
curl_close ($ch);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form>
                    <fieldset>
                        <legend class="text-center header>Many thanks for your information, We'll contact you back as soon as possible</legend>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }
</style>

