<?php
declare(strict_types=1);


namespace App\Model\EntityManager;

use App\Core\PdoConnect;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\Mapper\ProductsMapper;


class EntityManager
{

    private PdoConnect $pdoConnect;

    public function __construct(PdoConnect $pdoConnect)
    {
        $this->pdoConnect = $pdoConnect;
    }


    public function updateData(ProductsDataTransferObject $productDTO)
    {
        $name = $productDTO->getName();
        $description = $productDTO->getDescription();
        $price = $productDTO->getPrice();
        $id = $productDTO->getProductId();

        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("UPDATE products_list SET name='$name', description= '$description', price = '$price' WHERE productId = '$id'");
        $stmt->execute();
    }


    public function deleteProduct(int $productId)
    {

        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("DELETE FROM products_list WHERE productId= '$productId'");
        $stmt->execute();
    }


    public function addProduct(ProductsDataTransferObject $productDTO)
    {
        $name = $productDTO->getName();
        $description = $productDTO->getDescription();
        $price = $productDTO->getPrice();
        $categoryName = $productDTO->getCategoryName();
        $categoryId = $productDTO->getCategoryId();
        $productId = $productDTO->getProductId();

        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("INSERT into products_list (name, categoryName, categoryId, productId, price, description)
              VALUES ('$name','$categoryName' , '$categoryId', '$productId', '$price', '$description')");
        $stmt->execute();
    }
}