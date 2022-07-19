<?php
declare(strict_types=1);

namespace App\Model\Repository;


use App\Core\PdoConnect;
use App\Model\Mapper\UserMapper;


class UserRepository
{


    public function __construct(private PdoConnect $pdoConnect, private UserMapper $userMapper)
    {
    }

    public function findUserByName($name)
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM user_list WHERE name = '$name'");
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $this->userMapper->mapToDto($result);
    }

    public function findUserById($id)
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM user_list WHERE id = '$id'");
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $this->userMapper->mapToDto($result);
    }


    public function getAllUser()
    {
        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM user_list");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $userDtoList = [];
        foreach ($result as $oneUser) {
            $userDtoList[] = $this->userMapper->mapToDto($oneUser);
        }
        return $userDtoList;
    }

}