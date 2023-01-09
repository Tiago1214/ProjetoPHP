<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Pedido;
use Mpdf\Tag\P;

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
        $pedido->total='asdfsdf';
        $this->assertFalse($pedido->validate('total'));
        $pedido->total=15;
        $this->assertTrue($pedido->validate('total'));
        //validar tipo pedido
        $pedido->tipo_pedido=null;
        $this->assertFalse($pedido->validate('tipo_pedido'));
        $pedido->tipo_pedido='adsafsdf';
        $this->assertFalse($pedido->validate('tipo_pedido'));
        $pedido->tipo_pedido=1;
        $this->assertTrue($pedido->validate('tipo_pedido'));
        //validar  estado
        $pedido->estado=null;
        $this->assertFalse($pedido->validate('estado'));
        $pedido->estado="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this->assertFalse($pedido->validate('estado'));
        $pedido->estado='Em Processamento';
        $this->assertTrue($pedido->validate('estado'));
        //validar profile_id
        $pedido->profile_id=null;
        $this->assertFalse($pedido->validate('profile_id'));
        $pedido->profile_id='safg';
        $this->assertFalse($pedido->validate('profile_id'));
        $pedido->profile_id=1.1;
        $this->assertFalse($pedido->validate('profile_id'));
        $pedido->profile_id=1;
        $this->assertTrue($pedido->validate('profile_id'));
        //validar metodo_pagamento_id
        $pedido->metodo_pagamento_id='safg';
        $this->assertFalse($pedido->validate('metodo_pagamento_id'));
        $pedido->metodo_pagamento_id=1.1;
        $this->assertFalse($pedido->validate('metodo_pagamento_id'));
        $pedido->metodo_pagamento_id=1;
        $this->assertTrue($pedido->validate('metodo_pagamento_id'));
        $pedido->metodo_pagamento_id=null;
        $this->assertTrue($pedido->validate('metodo_pagamento_id'));
        //validar mesa_id
        $pedido->mesa_id='safg';
        $this->assertFalse($pedido->validate('mesa_id'));
        $pedido->mesa_id=1.1;
        $this->assertFalse($pedido->validate('mesa_id'));
        $pedido->mesa_id=1;
        $this->assertTrue($pedido->validate('mesa_id'));
        $pedido->mesa_id=null;
        $this->assertTrue($pedido->validate('mesa_id'));
    }

    //criar registo de pedido
    public function testCreatePedido(){
        //criar pedido
        $pedido=new Pedido();
        $pedido->data='2023-01-11 10:51:16';
        $pedido->total=15369;
        $pedido->tipo_pedido=1;
        $pedido->estado='Concluído';
        $pedido->profile_id=2;
        $pedido->metodo_pagamento_id=1;
        $pedido->mesa_id=1;
        $pedido->save();
        //update
        $pedido=$this->tester->grabRecord('common\models\Pedido',['total'=>'15369']);
        $pedido->total=17890;
        $pedido->save();
        //delete
        $this->tester->seeRecord('common\models\Pedido', ['total' => '17890']);
        $pedido=$this->tester->grabRecord('common\models\Pedido',['total'=>'17890']);
        $pedido->delete();
        $this->tester->dontSeeRecord('common\models\Pedido',['total'=>'17890']);
    }
}
