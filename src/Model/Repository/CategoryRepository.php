<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Core\PdoConnect;
use App\Model\Mapper\CategoryCsvToDtoMapper;
use App\Model\Mapper\CategoryDatabaseToDtoMapper;

class CategoryRepository
{
    private PdoConnect $pdoConnect;

    public function __construct(CategoryDatabaseToDtoMapper $categoryMapper, PdoConnect $pdoConnect)
    {
        $this->categoryMapper = $categoryMapper;
        $this->pdoConnect = $pdoConnect;
    }

    public function findCategoryByName($name)
    {


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM category_list WHERE name = '$name'");
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result === FALSE) {
            return null;
        }
        return $this->categoryMapper->mapToDto($result);

    }
}
