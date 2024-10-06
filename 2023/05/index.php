<?php

$data = file_get_contents('.txt');
$data = explode("\n", $data);

$mensaje = "";

$registrosInvalidos = [];

foreach ($data as $item) {
  $registro = explode(",", $item);
  $aux = 0;
  $valido = false;
  for ($i = 0; $i < count($registro); $i++) {
    // ID
    if (isset($registro[0]) && preg_match("/^[a-zA-Z0-9]+$/", $registro[0])) {
      $aux += 1;
      $valido = true;
    }
    // USERNAME
    if (isset($registro[1]) && preg_match("/^[a-zA-Z0-9]+$/", $registro[1])) {
      $aux += 1;
      $valido = true;
    }
    // EMAIL
    if (isset($registro[2]) && filter_var($registro[2], FILTER_VALIDATE_EMAIL)) {
      $aux += 1;
      $valido = true;
    }
    // AGE
    if (isset($registro[3]) && preg_match("/^[0-9]+$/", $registro[3])) {
      $aux += 1;
    }
    // LOCATION
    if (isset($registro[4]) && preg_match("/^[a-zA-Z0-9]+$/", $registro[4])) {
      $aux += 1;
    }
  }
}
