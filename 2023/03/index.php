<?php

# Mi solución
$claves = file_get_contents(".txt");
$claves = explode("\n", $claves);

$clavesCorrectas = [];
$clavesIncorrectas = [];

foreach ($claves as $clave) {
  $clave = explode(":", $clave);
  $politica = explode(" ", $clave[0]);
  $parametros = explode("-", $politica[0]);
  $min = $parametros[0];
  $max = $parametros[1];
  $criterio = $politica[1];
  $password = trim($clave[1]);
  $repeticiones = 0;

  for ($i = 0; $i < strlen($password); $i++) {
    if ($criterio === $password[$i]) {
      $repeticiones++;
    }
  }

  if ($repeticiones >= $min && $repeticiones <= $max) {
    $clavesCorrectas[] = $password;
  } else {
    $clavesIncorrectas[] = $password;
  }
}

echo 'Claves correctas: ' . count($clavesCorrectas) . '<br>';
echo 'Claves incorrectas: ' . count($clavesIncorrectas) . '<br>';
echo "Password para carpeta private: $clavesIncorrectas[12] <br>";
echo "Clave del reto: $clavesIncorrectas[41] <br>";


// Solución de la IA
// Función para verificar si una contraseña cumple con su política
function esClaveValida($politica, $clave)
{
  list($rango, $letra) = explode(" ", $politica);
  list($min, $max) = explode("-", $rango);

  // Contar cuántas veces aparece la letra en la contraseña
  $ocurrencias = substr_count($clave, $letra);

  // Verificar si la cantidad de ocurrencias está dentro del rango permitido
  return $ocurrencias >= $min && $ocurrencias <= $max;
}

// Función para contar claves válidas en la lista
function contarClavesValidas($lista)
{
  $clavesValidas = 0;

  // Iterar sobre cada línea de la lista
  foreach ($lista as $linea) {
    // Verificar si la línea no está vacía
    if (!empty($linea)) {
      list($politica, $clave) = explode(": ", $linea);

      // Verificar si la clave cumple con su política
      if (esClaveValida($politica, $clave))   $clavesValidas++;
    }
  }

  return $clavesValidas;
}

// Leer el archivo que contiene la lista de contraseñas
$archivo = file_get_contents(".txt");

// Dividir el archivo en líneas y contar las claves válidas
$lista = explode("\n", $archivo);
$clavesValidas = contarClavesValidas($lista);

echo "Claves válidas: " . $clavesValidas . PHP_EOL;
echo "Claves no válidas: " . (count($lista) - $clavesValidas) . PHP_EOL;


/**
 * En resumen:
 * 
 * En esta ocasión he podido aprender algo ya que no conocia la función list() de php, es util para hacer separaciones de arrays y asiganar de una ves la variable
 * Tabmién la función substr_count() que ya te cuenta las coincidencias de una letra en un string, eso hace que se evite el for que hice yo al ignorar estas funciones
 *
 * Entonces el código final sería sin duda el de la IA ya que aparte de hacer uso de funciones también reduce el ciclo for que yo habia usado y reduce algunas lineas al asiganr los valroes de las varaibles usadas
 */
