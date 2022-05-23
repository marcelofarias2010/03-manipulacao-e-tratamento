<?php
require __DIR__ .'/../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);
$string = "O último show do AC/DC foi incrível!";
var_dump([
  "string"=>$string, //'O último show do AC/DC foi incrível!' (length=38)
  "strlen"=>strlen($string), //int 38
  "mb_strlen"=>mb_strlen($string), //int 36
  "mb_substr"=>mb_substr($string, "9"), //'show do AC/DC foi incrível!' (length=28)
  "strtoupper"=>strtoupper($string), //'O úLTIMO SHOW DO AC/DC FOI INCRíVEL!' (length=38)
  "mb_strtoupper"=>mb_strtoupper($string) //'O ÚLTIMO SHOW DO AC/DC FOI INCRÍVEL!'
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);
$mbstring = $string;
var_dump([
  "mb_strtoupper" => strtoupper($mbstring),//'O úLTIMO SHOW DO AC/DC FOI INCRíVEL!'
  "mb_strtolower" => mb_strtolower($mbstring),//'o último show do ac/dc foi incrível!'
  "mb_convert_case UPPER"=> mb_convert_case($mbstring, MB_CASE_UPPER),//'O ÚLTIMO SHOW DO AC/DC FOI INCRÍVEL!'
  "mb_convert_case LOWER"=> mb_convert_case($mbstring, MB_CASE_LOWER),//'o último show do ac/dc foi incrível!'
  "mb_convert_case TITLE"=> mb_convert_case($mbstring, MB_CASE_TITLE),//'O Último Show Do Ac/Dc Foi Incrível!'
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);
$mbReplace = $mbstring." Fui, iria novamente, e foi épico!";
var_dump([
  "mb_strlen"=>mb_strlen($mbReplace),//int 70
  "mb_strpos"=>mb_strpos($mbReplace,", "),//int 40
  "mb_strrpos"=>mb_strrpos($mbReplace,", "),// int 56
  "mb_substr"=>mb_substr($mbReplace,40+2,14),//'iria novamente' 
  "mb_strstr"=>mb_strstr($mbReplace,", ",true),// 'O último show do AC/DC foi incrível! Fui'
  "mb_strrchr"=>mb_strrchr($mbReplace,", ",true)//'O último show do AC/DC foi incrível! Fui, iria novamente'
]);
$mbReplace = $string;
echo "<p>",$mbReplace,"</p>"; //O último show do AC/DC foi incrível!
echo "<p>",str_replace("AC/DC","Nirvana",$mbReplace),"</p>";//O último show do Nirvana foi incrível!
echo "<p>",str_replace(["AC/DC","eu fui","último"],"Nirvana",$mbReplace),"</p>";//O Nirvana show do Nirvana foi incrível!
echo "<p>",str_replace(["AC/DC","incrível"],["Nirvana","ÉPICOOOO"],$mbReplace),"</p>";//O último show do Nirvana foi ÉPICOOOO!

$article = <<<ROCK
  <article>
    <h3>evento</h3>
    <p>desc</p>
  </article>
ROCK;

$articleData = [
  "evento" => "Rock in Rio",
  "desc"=> $mbReplace
];

echo str_replace(array_keys($articleData),array_values($articleData),$article);
/*
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);
$endPoint = "name=Marcelo&email=mljinformatica@gmail.com";

mb_parse_str($endPoint,$parseEndPoint);

var_dump([
  $endPoint,
  $parseEndPoint,
  (object)$parseEndPoint
]);