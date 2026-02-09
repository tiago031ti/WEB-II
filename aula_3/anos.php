<?php
$marca  = $_GET['marca'];
$modelo = $_GET['modelo'];

echo file_get_contents(
  "https://parallelum.com.br/fipe/api/v1/carros/marcas/$marca/modelos/$modelo/anos"
);
