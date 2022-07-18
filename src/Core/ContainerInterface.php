<?php declare(strict_types=1);

namespace App\Core;

interface ContainerInterface
{
    /**
     * @param string $key
     * @param object $value
     *
     * @return void
     */
    public function set(string $key, object $value): void ;

    /**
     * @param object $key
     *
     * @return mixed
     */
    public function get(string $key): object;
}