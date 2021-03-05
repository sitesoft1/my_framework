<?php
set_time_limit(0);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/lib/phpQuery-onefile.php';
require_once __DIR__ . '/classes/db.php';
//$db = new Db();

$url = 'https://evropochta.by/calc/';
$html = file_get_contents($url);

$doc = phpQuery::newDocument($html);

//Получим текст одного елемента
$entry = $doc->find('title');
$title = pq($entry)->text();
dump($title);

//Получим текст нескольких елементов
$css = array();
$entry = $doc->find('head link[rel="stylesheet"]');
foreach ($entry as $row) {
    $css[] = pq($row)->attr('href');
}
dump($css);
