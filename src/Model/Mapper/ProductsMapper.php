<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DTO\ProductsDataTransferObject;

class ProductsMapper
{


    public function mapToDto(array $product): ProductsDataTransferObject
    {
        $productsDto = new ProductsDataTransferObject();

        $productsDto->setCategoryId($product['categoryId']);
        $productsDto->setCategoryName($product['categoryName']);
        $productsDto->setName($product['name']);
        $productsDto->setDescription($product['description']);
        $productsDto->setPrice($product['price']);
        $productsDto->setProductId($product['productId']);

        return $productsDto;
    }


}