<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';



function importCsvToDatabase()
{
    $products = new \App\Services\CsvReader();

    $csv = \League\Csv\Reader::createFromPath(__DIR__ . '/../files/MOCK_DATA.csv');
    $csv->setHeaderOffset(0);
    $productsDtoList = [];
    $ProductArrayToDtoMapper = new \App\Model\Mapper\ProductArrayToDtoMapper();
    $productEntityManager = new \App\Model\EntityManager\ProductEntityManager($pdoConnect = new \App\Core\PdoConnect());
    foreach ($csv as $item) {
        $productsDto = $ProductArrayToDtoMapper->product($item);
        $productEntityManager->addProduct($productsDto);
    }
}

importCsvToDatabase();