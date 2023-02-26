<?php

// Replace the following with your bot token
define('BOT_TOKEN', 'your_bot_token_here');

// Define the endpoint for sending API requests to Telegram server
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// Retrieve the incoming update from Telegram
$update = json_decode(file_get_contents('php://input'), true);

// Check if the update is a new user joined message
if (isset($update['message']['new_chat_members'])) {
  $chat_id = $update['message']['chat']['id'];
  $message_id = $update['message']['message_id'];

  // Send a request to delete the new user joined message
  $request_url = API_URL.'deleteMessage?chat_id='.$chat_id.'&message_id='.$message_id;
  file_get_contents($request_url);
}

?>
