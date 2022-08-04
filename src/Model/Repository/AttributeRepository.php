<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Core\PdoConnect;
use App\Model\Mapper\AttributeDatabaseToDtoMapper;
use App\Model\Mapper\AttributeCsvToDtoMapper;

class AttributeRepository
{

    public function __construct(private PdoConnect $pdoConnect, private AttributeDatabaseToDtoMapper $attributeMapper)
    {
    }


    public function findAttributeById($attributeName)
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();

        $stmt = $pdoConnection->prepare("SELECT * FROM attributeList WHERE name = '$attributeName'");
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result === FALSE) {
            return NULL;
        }


        return $this->attributeMapper->mapToDto($result);
    }

}