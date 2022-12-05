<?php


function generatePassword($lenght, $listChars){
  $psw = '';


  while(strlen($psw) < $lenght){

    $char = getChar($listChars);

    // eventuale controllo univocità
    if($_GET['allow-duplicates'] || !str_contains($psw, $char)){
      $psw .= $char;
    }

  }


  return $psw;
}


function getChar($listChars){

  $char = $listChars[rand(0,strlen($listChars)-1)];
  return $char;
}