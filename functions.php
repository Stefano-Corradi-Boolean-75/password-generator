<?php


function generatePassword($lenght, $listChars){
  $psw = '';


  for($i = 0; $i < $lenght; $i++){

    $psw .= getChar($listChars);

  }

  return $psw;
}


function getChar($listChars){

  $char = $listChars[rand(0,strlen($listChars)-1)];
  return $char;
}