<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

$products = new \App\Services\CsvReader();

$csv = \League\Csv\Reader::createFromPath(__DIR__ . '/../files/MOCK_DATA.csv');
$csv->setHeaderOffset(0);
$productsDtoList = [];
$ProductArrayToDtoMapper = new \App\Model\Mapper\ProductArrayToDtoMapper();

foreach ($csv as $item) {
$productsDtoList[] = $ProductArrayToDtoMapper->category($item);
}
$products =  $productsDtoList;
