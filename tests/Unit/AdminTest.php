<?php

namespace Tests\Unit;

use App\Http\Controllers\Admin\AdminController;
use PHPUnit\Framework\TestCase;
include_once("D:\ProgramFiles\wamp3.2.0\www\onlineShop\prepend.php");
class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAdmin()
    {
        $test1=new AdminController();
        $id=20;
        $result=$test1->edit($id);
        dd($result);
    }

}
