<?php
declare(strict_types=1);

namespace App\Model;

use App\Core\PdoConnect;

class CategoryRepository
{
    private PdoConnect $pdoConnect;

    public function __construct(PdoConnect $pdoConnect)
    {
        $this->pdoConnect = $pdoConnect;
    }

    public function findAllById($categoryID)
    {



        $productsAsString = file_get_contents(__DIR__ . '/../products.json');

        $productsArray = json_decode($productsAsString, true);
        foreach ($productsArray as $oneCategroy) {
            if ($oneCategroy['categoryID'] === $categoryID) {
                $searchedCategory = "categoryname = " . $oneCategroy['categoryName'] . ", CategoryId =" . $oneCategroy['categoryID'];

            }

        }
        return $searchedCategory;
    }
}
