<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Core\PdoConnect;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\Mapper\ProductsMapper;

class ProductRepository
{
    private ProductsMapper $productsMapper;
    private PdoConnect $pdoConnect;

    public function __construct(ProductsMapper $productsMapper, PdoConnect $pdoConnect)
    {
        $this->productsMapper = $productsMapper;
        $this->pdoConnect = $pdoConnect;
    }

    public function findProductById($productId)
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();

        $stmt = $pdoConnection->prepare("SELECT * FROM products_list WHERE productId = '$productId'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $oneProduct) {
            if ($oneProduct['productId'] === (int)$productId) {
                return $this->productsMapper->mapToDto($oneProduct);
            }
        }
        return null;

    }

    public function findCategoryById($categoryId)
    {


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM products_list WHERE categoryId = '$categoryId'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $oneCategory) {
            if ($oneCategory['categoryId'] === $categoryId) {
                $productDtoList[] = $this->productsMapper->mapToDto($oneCategory);
            }
        }
        return $productDtoList;

    }

    public function getAllProducts()
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM products_list ");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $productDtoList = [];
        foreach ($result as $oneCategory) {
                $productDtoList[] = $this->productsMapper->mapToDto($oneCategory);
            }

        return $productDtoList;
    }




}