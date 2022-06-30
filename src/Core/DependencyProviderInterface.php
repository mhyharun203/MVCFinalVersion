<?php declare(strict_types=1);

namespace App\Core;

interface DependencyProviderInterface
{
    /**
     * @param \App\Core\ContainerInterface $container
     */
    public function provideDependencies(ContainerInterface $container): void;
}