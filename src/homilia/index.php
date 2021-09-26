<?php
//2021.09.26.00
//Protocol Corporation Ltda.
//https://github.com/ProtocolLive/SimpleTelegramBot

function Command_homilia():void{
  DebugTrace();
  global $Webhook;
  $msg = file_get_contents(__DIR__ . '/homilia.txt');
  $msg = str_replace('##NAME##', $Webhook->User->Name, $msg);
  $msg = explode('##BREAK##', $msg);
  foreach($msg as $temp):
    $Webhook->ReplyMsg($temp);
  endforeach;
  LogEvent('homilia');
}

function Command_homiliaset():void{
  DebugTrace();
  global $DB, $Webhook;
  if($DB->Admin($Webhook->User->Id)):
    file_put_contents(__DIR__ . '/homilia.txt', $Webhook->Parameters);
    $Webhook->ReplyMsg('👍');
  endif;
}