<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Pedido;

class PedidoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validar campos do pedido
    public function testValidation()
    {
        $pedido=new Pedido();

        //validar  data
        $pedido->data=null;
        $this->assertFalse($pedido->validate('data'));
        $pedido->data='2023-01-05 10:51:16';
        $this->assertTrue($pedido->validate('data'));
        //validar total
        $pedido->total=null;
        $this->assertFalse($pedido->validate('total'));
    }
}
