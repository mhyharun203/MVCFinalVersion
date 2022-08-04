<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DTO\AttributeDataTransferObject;

class AttributeCsvToDtoMapper
{

    public function mapToDto(string $name): AttributeDataTransferObject
    {
        $attributeDto = new AttributeDataTransferObject();
        $attributeDto->setName($name);
        return $attributeDto;
    }

}