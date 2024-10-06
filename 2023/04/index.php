<?php

# Mi solución
$files = file_get_contents('.txt');
$files = explode("\n", $files);

$reales = [];

foreach ($files as $file) {
  $file = explode("-", $file);
  $nameFile = trim($file[0]);
  $checkSumFile = trim($file[1]);

  $checkSumAux = "";
  $uniques = array_unique(str_split($nameFile));
  foreach ($uniques as $unique) {
    $checkSumAux .= $unique;
  }

  if ($checkSumFile === $checkSumFile) {
    $reales[] = $checkSumFile;
  }
}

echo "File real: $reales[32]";


// Solución de la IA:
function esReal($nombreArchivo)
{
  // Separar el nombre del archivo en dos partes usando el guion "-"
  $partes = explode('-', $nombreArchivo);

  // Verificar si hay exactamente dos partes
  if (count($partes) !== 2) {
    return false;
  }

  // Obtener la primera parte del nombre del archivo
  $primeraParte = $partes[0];

  // Calcular el checksum según las reglas
  $checksum = '';
  $caracteresUnicos = array_unique(str_split($primeraParte));
  foreach ($caracteresUnicos as $caracter) {
    $checksum .= $caracter;
  }

  // Comparar el checksum calculado con la segunda parte del nombre del archivo
  return $checksum === $partes[1];
}

// Lista de archivos
$archivos = file_get_contents('.txt');
$archivos = explode("\n", $archivos);

// Inicializar lista de archivos reales
$archivosReales = [];

// Verificar si cada archivo es real o falso
foreach ($archivos as $archivo) {
  if (esReal($archivo)) {
    $archivosReales[] = $archivo;
  }
}

// Encontrar el archivo en la posición 33
if (isset($archivosReales[32])) {
  echo "Archivo en la posición 33: " . $archivosReales[32] . " <br>";
} else {
  echo "No hay suficientes archivos reales para llegar a la posición 33. <br>";
}

// Pues la solución que me proporciono la IA no resulto en nada ya que no cuenta nada xd