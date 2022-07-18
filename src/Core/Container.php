<?php declare(strict_types=1);

namespace App\Core;

class Container implements ContainerInterface
{
    private array $parameter;

    /**
     * @param string $key
     * @param object $value
     *
     * @return void
     */
    public function set(string $key, object $value): void
    {
        $this->parameter[$key] = $value;
    }

    /**
     * @param mixed $key
     *
     * @return mixed
     * @throws \Exception
     */
    public function get(string $key): object
    {
        if (!isset($this->parameter[$key])) {
            throw new \Exception($key . 'Not Found');
        }
        return $this->parameter[$key];
    }
}