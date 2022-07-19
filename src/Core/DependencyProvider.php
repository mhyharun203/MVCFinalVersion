<?php declare(strict_types=1);

namespace App\Core;


use App\Model\EntityManager\ProductEntityManager;
use App\Model\EntityManager\UserEntityManager;
use App\Model\Mapper\ProductsMapper;
use App\Model\Mapper\UserMapper;
use App\Model\Repository\CategoryRepository;
use App\Model\Repository\ProductRepository;
use App\Model\Repository\UserRepository;

class DependencyProvider implements DependencyProviderInterface
{
    /**
     * @param \App\Core\ContainerInterface $container
     */


    public function provideDependencies(ContainerInterface $container): void
    {
        $container->set(PdoConnect::class, new PdoConnect());
        $container->set(ProductEntityManager::class, new ProductEntityManager($container->get(PdoConnect::class)));
        $container->set(ProductsMapper::class, new ProductsMapper());
        $container->set(ProductRepository::class, new ProductRepository($container->get(ProductsMapper::class), $container->get(PdoConnect::class)));
        $container->set(View::class, new View(new \Smarty()));
        $container->set(UserMapper::class, new UserMapper());
        $container->set(UserEntityManager::class, new UserEntityManager($container->get(PdoConnect::class)));
        $container->set(UserRepository::class, new UserRepository($container->get(PdoConnect::class), $container->get(UserMapper::class)));
    }
}