<?php
//2021.04.27.00
//Protocol Corporation Ltda.
//https://github.com/ProtocolLive/SimpleTelegramBot

function Command_homilia():void{
  DebugTrace();
  global $Bot;
  $Bot->Send($Bot->ChatId(), file_get_contents(__DIR__ . '/homilia.txt'));
  LogEvent('homilia');
}

function Command_homiliaset():void{
  DebugTrace();
  global $Bot, $DB;
  if($DB->Admin($Bot->UserId())):
    file_put_contents(__DIR__ . '/homilia.txt', $Bot->Parameters());
    $Bot->Send($Bot->UserId(), '👍');
  endif;
}