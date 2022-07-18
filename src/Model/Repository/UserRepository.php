<?php
declare(strict_types=1);

namespace App\Model\Repository;

use App\Core\PdoConnect;

class UserRepository
{




    public function __construct(private PdoConnect $pdoConnect)
    {

    }

    public function findUserByName($name){
        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("SELECT * FROM user_list WHERE username = $'$name'");


    }


}