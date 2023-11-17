<?php

# Mi solución
$message = "&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&";
$symbols = str_split($message); # Convertimos a un array

$aux = 0; # Variable auxiliar para el conteo
$codigo = ""; # Variable para obtener el resultado final
foreach ($symbols as $symbol) {
  match ($symbol) {
    "#" => $aux++,
    "@" => $aux--,
    "*" => $aux *= $aux,
    default => $codigo .= $aux,
  };
}

// Mi resultado fue 024899455 que es correcto
echo "Resultado: $codigo";

// ----------------------------------------------------------

// Resultado de la IA
$cadena = "&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&";

$valor_numerico = 0;

for ($i = 0; $i < strlen($cadena); $i++) {
  $simbolo = $cadena[$i];

  switch ($simbolo) {
    case '#':
      $valor_numerico++;
      break;
    case '@':
      $valor_numerico--;
      break;
    case '*':
      $valor_numerico *= $valor_numerico;
      break;
    case '&':
      echo $valor_numerico;
      break;
  }
}

// El resultado de la IA fue 0248994555 que es incorrecto
echo "Resultado: $valor_numerico \n";


// ----------------------------------------------------------

# En resumen, comparando mi resultado con el de la IA, recorde que puedes tomar la posción de un string como si fuese un array, así que pedir un resultado por parte de la IA no fue tan malo al final ya que me di cuenta que era innecesario convertir a un array el mensaje para realizar la tarea.
# Ahora bien el primer resultado no fue preciso por parte de la IA ya que el resultado fue erroneo pero bueno que se le va hacer, a demás de uso un swtich xd

# Mi solución (Editada)
$message = "&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&";

$aux = 0; # Variable auxiliar para el conteo
$codigo = ""; # Variable para obtener el resultado final

for ($i = 0; $i < strlen($message); $i++) {
  $symbol = $message[$i];
  match ($symbol) {
    "#" => $aux++,
    "@" => $aux--,
    "*" => $aux *= $aux,
    default => $codigo .= $aux,
  };
}

// Ahora ya con eso corregido el resultado sigue siendo el mismo
echo "Resultado: $codigo";
