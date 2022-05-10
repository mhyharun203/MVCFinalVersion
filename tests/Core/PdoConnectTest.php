<?php
declare(strict_types=1);

namespace AppTest\Core;

use PHPUnit\Framework\TestCase;
use App\Core\PdoConnect;

class PdoConnectTest extends TestCase
{

    public function testPdoConnect() {
    $pdoConnect = new PdoConnect();
    $a = $pdoConnect->connectToDatabase();
    self::assertSame('Connected successfully',$a);


    }

}