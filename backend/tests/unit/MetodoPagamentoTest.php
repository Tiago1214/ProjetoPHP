<?php


namespace backend\tests\Unit;

use backend\models\Metodopagamento;
use backend\tests\UnitTester;

class MetodoPagamentoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validações
    public function testValidation()
    {
        $metodo=new Metodopagamento();
        $cara255='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        //validar nome de pagamento
        $metodo->nomepagamento=null;
        $this->assertFalse($metodo->validate('nomepagamento'));
        $metodo->nomepagamento=$cara255;
        $this->assertFalse($metodo->validate('nomepagamento'));
        $metodo->nomepagamento='teste nome de pagamento';
        $this->assertTrue($metodo->validate('nomepagamento'));
        //validar estado
        $metodo->estado=null;
        $this->assertFalse($metodo->validate('estado'));
        $metodo->estado='sdfssdf';
        $this->assertFalse($metodo->validate('estado'));
        $metodo->estado=1;
        $this->assertTrue($metodo->validate('estado'));
    }


    //criar,editar e apagar
    public function testCreateMetodo(){
        $metodo=new Metodopagamento();
        $metodo->nomepagamento='Teste do multibanco teste';
        $metodo->estado=1;
        $metodo->save();
        //update
        $metodo=$this->tester->grabRecord('backend\models\MetodoPagamento',['nomepagamento'=>'Teste do multibanco teste']);
        $metodo->nomepagamento='teste do teste tem de ser teste';
        $metodo->save();
        //delete
        $this->tester->seeRecord('backend\models\MetodoPagamento', ['nomepagamento' => 'teste do teste tem de ser teste']);
        $metodo=$this->tester->grabRecord('backend\models\MetodoPagamento',['nomepagamento' => 'teste do teste tem de ser teste']);
        $metodo->delete();
        $this->tester->dontSeeRecord('backend\models\MetodoPagamento',['nomepagamento' => 'teste do teste tem de ser teste']);
    }
}
