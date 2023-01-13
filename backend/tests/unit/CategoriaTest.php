<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Categoria;

class CategoriaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validacoes
    public function testValidation()
    {
        $categoria=new Categoria();
        $cara200='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $cara260='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        //validar nome
        $categoria->nome=null;
        $this->assertFalse($categoria->validate('nome'));
        $categoria->nome='Carne';
        $this->assertFalse($categoria->validate('nome'));
        $categoria->nome=$cara200;
        $this->assertFalse($categoria->validate('nome'));
        $categoria->nome='Teste Unitário de Categoria';
        //validar descricao
        $categoria->descricao=null;
        $this->assertFalse($categoria->validate('descricao'));
        $categoria->descricao=$cara260;
        $this->assertFalse($categoria->validate('descricao'));
        $categoria->descricao='Teste unitário de categoria numero 1';
        $this->assertTrue($categoria->validate('descricao'));
        //validar estado
        $categoria->estado=null;
        $this->assertFalse($categoria->validate('estado'));
        $categoria->estado='sdfsdf';
        $this->assertFalse($categoria->validate('estado'));
        $categoria->estado=1;
        $this->assertTrue($categoria->validate('estado'));
    }


    //criar,editar,apagar
    public function testCreateCategoria(){
        //criar categoria
        $categoria=new Categoria();
        $categoria->nome='Teste Unitário numero 1';
        $categoria->descricao='Teste do teste unitario numero 1';
        $categoria->estado=1;
        $categoria->save();
        //update
        $categoria=$this->tester->grabRecord('common\models\Categoria',['nome'=>'Teste Unitário numero 1']);
        $categoria->descricao='Teste unitario update 1';
        $categoria->save();
        //delete
        $this->tester->seeRecord('common\models\Categoria', ['descricao' => 'Teste unitario update 1']);
        $categoria=$this->tester->grabRecord('common\models\Categoria',['descricao' => 'Teste unitario update 1']);
        $categoria->delete();
        $this->tester->dontSeeRecord('common\models\Categoria',['descricao' => 'Teste unitario update 1']);
    }
}
