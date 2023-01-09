<?php


namespace backend\tests\Unit;

use backend\models\Iva;
use backend\tests\UnitTester;

class IvaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validações
    public function testValidation()
    {
        $iva=new Iva();
        $cara255='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';

        //validar descricao
        $iva->descricao=null;
        $this->assertFalse($iva->validate('descricao'));
        $iva->descricao=$cara255;
        $this->assertFalse($iva->validate('descricao'));
        $iva->descricao='Iva Teste 1%';
        $this->assertTrue($iva->validate('descricao'));
        //validar taxaiva
        $iva->taxaiva=null;
        $this->assertFalse($iva->validate('taxaiva'));
        $iva->taxaiva='sdagsdfg';
        $this->assertFalse($iva->validate('taxaiva'));
        $iva->taxaiva=5;
        $this->assertTrue($iva->validate('taxaiva'));
        //validar estado
        $iva->estado=null;
        $this->assertFalse($iva->validate('estado'));
        $iva->estado='sadgdsfg';
        $this->assertFalse($iva->validate('estado'));
        $iva->estado=1;
        $this->assertTrue($iva->validate('estado'));
    }

    //criar,editar,apagar
    public function testCreateIva(){
        //criar iva
        $iva=new Iva();
        $iva->descricao='teste de iva 1000 porque tem de ser';
        $iva->taxaiva=1001;
        $iva->estado=1;
        $iva->save();
        //update
        $iva=$this->tester->grabRecord('backend\models\Iva',['taxaiva'=>1001]);
        $iva->descricao='teste do teste tem de ser teste';
        $iva->save();
        //delete
        $this->tester->seeRecord('backend\models\Iva', ['descricao' => 'teste do teste tem de ser teste']);
        $iva=$this->tester->grabRecord('backend\models\Iva',['descricao' => 'teste do teste tem de ser teste']);
        $iva->delete();
        $this->tester->dontSeeRecord('backend\models\Iva',['descricao' => 'teste do teste tem de ser teste']);
    }
}
