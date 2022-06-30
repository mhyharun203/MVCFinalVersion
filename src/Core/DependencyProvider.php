<?php declare(strict_types=1);

namespace App\Core;


use App\Model\EntityManager\EntityManager;
use App\Model\Mapper\ProductsMapper;
use App\Model\Repository\CategoryRepository;
use App\Model\Repository\ProductRepository;

class DependencyProvider implements DependencyProviderInterface
{
    /**
     * @param \App\Core\ContainerInterface $container
     */


    public function provideDependencies(ContainerInterface $container): void
    {
        $container->set(PdoConnect::class, new PdoConnect());
        $container->set(EntityManager::class, new EntityManager($container->get(PdoConnect::class)));
        $container->set(ProductsMapper::class, new ProductsMapper());
        $container->set(ProductRepository::class, new ProductRepository($container->get(ProductsMapper::class), $container->get(PdoConnect::class)));
        $container->set(View::class, new View(new \Smarty()));

    }
}