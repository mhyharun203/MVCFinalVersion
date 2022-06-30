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
}