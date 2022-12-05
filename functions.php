<?php


function generatePassword($length, $listChars, $characters){
  $psw = '';

  $totalLength = 0;

  foreach($characters as $charIndex){
    // calcolo la lunghezza totale dei caratteri
    $totalLength += strlen($listChars[$charIndex]);
    
  }

  // se length è più lungo di totalLength assume la sua lunghezza
  // così non si può creare un loop infinito in caso di univocità
  if($length > $totalLength) $length = $totalLength;


  while(strlen($psw) < $length){

    $char = getChar($listChars, $characters);

    // eventuale controllo univocità
    if($_GET['allow-duplicates'] || !str_contains($psw, $char)){
      $psw .= $char;
    }

  }


  return $psw;
}


function getChar($listChars, $characters){

  // esctraggo l'indice dell'array di caratteri
  $index = $characters[rand(0, count($characters) -1 )];
  // prendo la lista di caratteri estratta
  $charStr = $listChars[$index];
  // estraggo random dalla lista di caratteri
  return $charStr[rand(0, strlen($charStr) - 1)];
}