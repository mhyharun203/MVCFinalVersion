<?php
declare(strict_types=1);

namespace App\Model\EntityManager;

use App\Core\PdoConnect;
use App\Model\DTO\AttributeDataTransferObject;
use App\Model\DTO\ProductsDataTransferObject;

class AttributeEntityManager
{

    private PdoConnect $pdoConnect;

    public function __construct(PdoConnect $pdoConnect)
    {
        $this->pdoConnect = $pdoConnect;
    }


    public function addAttribute(AttributeDataTransferObject $attributeDto)
    {

        $attribute = $attributeDto->getName();


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("INSERT into attributeList (name)
              VALUES ('$attribute')");
        $stmt->execute();
    }
}

