<?php

header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../lib/ChatLine.php';
include '../lib/Database.php';

$h = new Handler();
if (isset($_GET["q"])) {

    $h->handleRequest($_GET["q"]);
} else {
    $h->jsonResponse(-1, "no questions sent", "");
}

exit();

class Handler {

    public function handleRequest($query) {

        $chat = new Database();
        $this->jsonResponse(1, "chatbot answered", $chat->answer($query));
    }

    public function jsonResponse($status, $status_message, $data) {
        $response = array();
        $response['status'] = $status;
        $response['message'] = $status_message;
        $response['data'] = $data;
        $json_response = json_encode($response, JSON_UNESCAPED_UNICODE);
        echo $json_response;
    }

}
