<?php
declare(strict_types=1);

namespace App\Model\Mapper;


use App\Model\DTO\UserDataTransferObject;

class UserMapper
{
    public function mapToDto(array $user): UserDataTransferObject
    {
        $userDto = new UserDataTransferObject();

        $userDto->setId($user['id']);
        $userDto->setName($user['name']);
        $userDto->setEmail($user['email']);
        $userDto->setPassword($user['password']);
        return $userDto;
    }
}