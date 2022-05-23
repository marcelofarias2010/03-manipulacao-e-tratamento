<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);
$arrProfile = [
  "name"=>"Marcelo",
  "company"=>"ADAPS",
  "mail"=>"marcelo.farias@adapsbrasil.com.br"
];

$objProfile = (object)$arrProfile;
//var_dump($arrProfile,$objProfile);
echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
var_dump($ceo);

$company = new StdClass();
$company->company = "ADAPS";
$company->ceo = $ceo;
$company->manager = new StdClass();
$company->manager->name = "Amilton";
$company->manager->mail = "amilton.barreto@adapsbrasil.com.br";

var_dump($company);
/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$date = new DateTime();


var_dump([
  "class" => get_class($date),
  "methods" => get_class_methods($date),
  "vars" => get_object_vars($date),
  "parent" => get_parent_class($date),
  "subclass" => is_subclass_of($date,"DateTime")
]);