<?php
//2021.04.25.01
//Protocol Corporation Ltda.
//https://github.com/ProtocolLive/SimpleTelegramBot

function Command_homilia(TblCmd $Webhook):void{
  DebugTrace();
  $msg = file_get_contents(__DIR__ . '/homilia.txt');
  $msg = str_replace('##NAME##', $Webhook->User->Name, $msg);
  $msg = explode('##BREAK##', $msg);
  foreach($msg as $temp):
    $Webhook->ReplyMsg($temp);
  endforeach;
  LogEvent('homilia');
}

function Command_homiliaset(TblCmd $Webhook):void{
  DebugTrace();
  global $DB;
  if($DB->Admin($Webhook->User->Id)):
    file_put_contents(__DIR__ . '/homilia.txt', $Webhook->Parameters);
    $Webhook->ReplyMsg('👍');
  endif;
}