<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';


function importCsvToDatabase()
{
    $products = new \App\Services\CsvReader();

    $csv = \League\Csv\Reader::createFromPath(__DIR__ . '/../files/MOCK_DATA.csv');
    $csv->setHeaderOffset(0);
    $productsDtoList = [];
    $productRepository = new \App\Model\Repository\ProductRepository(new \App\Model\Mapper\ProductsMapper(), new \App\Core\PdoConnect());
    $categoryCsvToDtoMapper = new \App\Model\Mapper\CategoryCsvToDtoMapper();
    $catergoryEntityManager = new \App\Model\EntityManager\CategoryEntityManager($pdoConnect = new \App\Core\PdoConnect());
    $CategoryDtoMapper = new \App\Model\Mapper\CategoryCsvToDtoMapper();
    $ProductArrayToDtoMapper = new \App\Model\Mapper\ProductArrayToDtoMapper();
    $productEntityManager = new \App\Model\EntityManager\ProductEntityManager($pdoConnect = new \App\Core\PdoConnect());
    $categoryRepository = new \App\Model\Repository\CategoryRepository(new \App\Model\Mapper\CategoryDatabaseToDtoMapper(), $pdoConnect);
    $attributeDatabaseToDtoMapper = new \App\Model\Mapper\AttributeDatabaseToDtoMapper();
    $attributeMapper = new \App\Model\Mapper\AttributeCsvToDtoMapper();
    $attributeRepository = new \App\Model\Repository\AttributeRepository(new \App\Core\PdoConnect(), new \App\Model\Mapper\AttributeDatabaseToDtoMapper());
    $attributeEntitymanager = new \App\Model\EntityManager\AttributeEntityManager(new \App\Core\PdoConnect());
    foreach ($csv as $item) {

        if (!$productRepository->findProductByName($item['product_name']) instanceof \App\Model\DTO\ProductsDataTransferObject) {
            $productsDto = $ProductArrayToDtoMapper->product($item);
            $productEntityManager->addProduct($productsDto);
        }
        if (!$categoryRepository->findCategoryByName($item['categoryName']) instanceof \App\Model\DTO\CategoryDataTransferObject) {
            $categoryDto = $categoryCsvToDtoMapper->mapToDto($item);
            $catergoryEntityManager->addCategory($categoryDto);
        }
        for ($i = 1; $i <= 3; $i++) {
            if (!$attributeRepository->findAttributeById($item[sprintf('attr%s', $i)]) instanceof \App\Model\DTO\AttributeDataTransferObject) {
                $attributeDto = $attributeMapper->mapToDto($item[sprintf('attr%s', $i)]);
                $attributeEntitymanager->addAttribute($attributeDto);
            }
        }
    }
}
    importCsvToDatabase();