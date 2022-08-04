<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DTO\AttributeDataTransferObject;


class AttributeDatabaseToDtoMapper
{


    public function mapToDto(array $attribute): AttributeDataTransferObject
    {
        $attributeDto = new AttributeDataTransferObject();


        $attributeDto->setName($attribute['name']);
        $attributeDto->setId($attribute['id']);
        return $attributeDto;
    }

}