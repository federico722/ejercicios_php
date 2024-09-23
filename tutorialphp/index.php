<?php

// variable string
 $name = "Miguel";

 // variable boolean
 $isDev = true;
 // variable number
 $age = "44";

 //concatenacion
 $newAge = $age . "1" ;

 //var_dump nos dice el tipo de variable y lo imprime en la pagina
 var_dump($name);
 // gettype nos dice el tipo de variable
 echo  gettype($isDev);
// is_string devuelve un true o false, verifica si es un string 
if (!is_string($age)) {
    echo "No es string";
 }else{
    echo "Es string";
 }

$output = "Hola $name";

$output .= ", con una edad de $age."



?>

<h1>
    <?= $output ?>
</h1>
<style>
  
:root {
      /*
       color del fondo de la pagina web
      */ 
    color-scheme: light dark;
}

body{
    display: grid;
    place-content: center;
}
</style>