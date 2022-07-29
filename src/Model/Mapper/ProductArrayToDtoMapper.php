<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DTO\ProductsDataTransferObject;
use App\Services\CsvReader;

class ProductArrayToDtoMapper
{


    public function product(array $records): ProductsDataTransferObject
    {


        $productDto = new ProductsDataTransferObject();
        $productDto->setProductId((int)$records['id']);
        $productDto->setArt($records['art']);
        $productDto->setName($records['product_name']);
        $productDto->setPrice($records['price']);
        $productDto->setCategoryName($records['categoryName']);
        $productDto->setDescription($records['description']);
        $productDto->setCategoryId(0);

        return $productDto;
    }
}

