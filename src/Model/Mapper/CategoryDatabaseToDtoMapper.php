<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\DTO\CategoryDataTransferObject;

class CategoryDatabaseToDtoMapper
{

    public function mapToDto(array $category): CategoryDataTransferObject
    {
        $categoryDto = new CategoryDataTransferObject();


        $categoryDto->setName($category['name']);
        $categoryDto->setId($category['id']);
        return $categoryDto;
    }
}
