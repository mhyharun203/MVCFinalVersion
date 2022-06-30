<?php
declare(strict_types=1);

namespace AppTest\Model;

use App\Model\Mapper\ProductsMapper;
use App\Model\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{


    public function testFindProductById()
    {
        $mapper = new ProductsMapper();
        $productRepository = new ProductRepository($mapper);
        $testProductOne = $productRepository->findProductById(1);
        $testProductTwo = $productRepository->findProductById(2);
        self::assertSame('Black Jeans', $testProductOne->getName());
        self::assertSame('Blue Jeans', $testProductTwo->getName());
    }


    public function testFindCategoryById()
    {
        $mapper = new ProductsMapper();
        $productRepository = new ProductRepository($mapper);
        $testProductOne = $productRepository->findCategoryById(1);
        $testProductTwo = $productRepository->findCategoryById(1);
        $testProductThree = $productRepository->findCategoryById(1);

        self::assertSame('Black Jeans', $testProductOne['0']->getName());
        self::assertSame('Blue Jeans', $testProductOne['1']->getName());
        self::assertSame('Ripped Jeans', $testProductOne['2']->getName());

    }
}