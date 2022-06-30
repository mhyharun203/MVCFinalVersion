<?php declare(strict_types=1);

namespace App\Core;

interface ContainerInterface
{
    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function set(mixed $key, mixed $value): void;

    /**
     * @param mixed $key
     *
     * @return mixed
     */
    public function get(mixed $key): mixed;
}