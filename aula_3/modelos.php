<?php

$marca = $_GET['marca'];

echo file_get_contents(
  "https://parallelum.com.br/fipe/api/v1/carros/marcas/$marca/modelos"
);
