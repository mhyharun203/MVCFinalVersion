<?php
declare(strict_types=1);

namespace App\Core;


use PDO;
use PDOException;


class PdoConnect
{
    public function connectToDatabase()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "nexus123";

        try {
            $conn = new PDO("mysql:host=$servername; port=3336; dbname=products", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn ;
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }


}
