<?php
declare(strict_types=1);

namespace App\Model\EntityManager;

use App\Core\PdoConnect;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\DTO\UserDataTransferObject;

class UserEntityManager
{


    public function __construct(private PdoConnect $pdoConnect)
    {

    }

    public function updateData(UserDataTransferObject $userDto)
    {
        $name = $userDto->getName();
        $password = $userDto->getPassword();
        $email = $userDto->getEmail();
        $id = $userDto->getId();


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("UPDATE user_list SET name='$name', email = '$email', password = '$password' WHERE id = '$id'");
        $stmt->execute();
    }

    public function deleteUser(int $id)
    {

        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("DELETE FROM user_list WHERE id= '$id'");
        $stmt->execute();
    }


    public function addProduct(UserDataTransferObject $userDto)
    {
        $name = $userDto->getName();
        $password = $userDto->getPassword();
        $email = $userDto->getEmail();


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("INSERT into user_list (name,email,password)
              VALUES ('$name', '$email' ,'$password')");
        $stmt->execute();
    }
}