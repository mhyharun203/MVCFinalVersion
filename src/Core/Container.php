<?php declare(strict_types=1);

namespace App\Core;

class Container implements ContainerInterface
{
    private array $parameter;

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function set(mixed $key, mixed $value): void
    {
        $this->parameter[$key] = $value;
    }

    /**
     * @param mixed $key
     *
     * @return mixed
     * @throws \Exception
     */
    public function get(mixed $key): mixed
    {
        if (!isset($this->parameter[$key])) {
            throw new \Exception($key . 'Not Found');
        }
        return $this->parameter[$key];
    }
}