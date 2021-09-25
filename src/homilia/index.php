<?php
//2021.04.25.00
//Protocol Corporation Ltda.
//https://github.com/ProtocolLive/SimpleTelegramBot

function Command_homilia(TblCmd $Webhook):void{
  DebugTrace();
  $Webhook->ReplyMsg(file_get_contents(__DIR__ . '/homilia.txt'));
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