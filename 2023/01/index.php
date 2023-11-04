<?php

# Mi solución
$words = file_get_contents(".txt"); # Cargamos el texto del mensaje
$words = explode(" ", $words); # Convertimos a un array

$arr = []; # Array auxiliar para el conteo
foreach ($words as $word) {
  # Validamos si existe ese indice en el array auxiliar | Si existe aumentamos el valor | Si no existe iniciamos con 1
  $arr[$word] = isset($arr[$word]) ? $arr[$word] + 1 : 1;
}

$codigo = ""; # Variable auxiliar para el conteo
foreach ($arr as $key => $item) {
  $codigo .= "$key$item"; # Concatenamos el indice y valor para formar el mensaje para el submit
}

echo $codigo;

echo "\n";

// Mejora con IA (tu ya sabes cual)
$message = file_get_contents(".txt");
$words = str_word_count($message, 1); // Convierte a un array por cada palabra
$count = array_count_values($words); // Cuenta los indices del array
$code = "";
foreach ($count as $word => $amount) {
  $code .= "$word$amount";
}

echo $code;