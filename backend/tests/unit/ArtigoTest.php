<?php
namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Artigo;

class ArtigoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validar campos do artigo
    public function testValidation()
    {
        $artigo=New Artigo();
        $cara200='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $cara260='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        //validar nome
        $artigo->nome=null;
        $this->assertFalse($artigo->validate('nome'));
        $artigo->nome==$cara200;
        $this->assertFalse($artigo->validate('nome'));
        $artigo->nome='vamo qui vamo';
        $this->assertTrue($artigo->validate('nome'));
        //validar descricao
        $artigo->descricao=null;
        $this->assertFalse($artigo->validate('descricao'));
        $artigo->descricao=$cara260;
        $this->assertFalse($artigo->validate('descricao'));
        $artigo->descricao='descricao verdadeira';
        $this->assertTrue($artigo->validate('descricao'));
        //validar referencia
        $artigo->referencia=null;
        $this->assertFalse($artigo->validate('referencia'));
        $artigo->referencia='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $artigo-self::assertFalse($artigo->validate('referencia'));
        $artigo->referencia='testereferencia';
        $this->assertTrue($artigo->validate('referencia'));
        //validar preco
        $artigo->preco=null;
        $this->assertFalse($artigo->validate('preco'));
        $artigo->preco='sdfgsdfg';
        $this->assertFalse($artigo->validate('preco'));
        $artigo->preco=10.5;
        $this->assertTrue($artigo->validate('preco'));
        //validar data
        $artigo->data=null;
        $this->assertFalse($artigo->validate('data'));
        $artigo->data='12/15/2022';
        $this->assertFalse($artigo->validate('data'));
        $artigo->data='2022-01-10 09:50:35';
        $this->assertTrue($artigo->validate('data'));
        //validar imagem
        $artigo->imagem=null;
        $this->assertTrue($artigo->validate('imagem'));
        $artigo->imagem='art_16.jpg';
        $this->assertTrue($artigo->validate('imagem'));
        //validar imagemurl
        $artigo->imagemurl=null;
        $this->assertTrue($artigo->validate('imagemurl'));
        $artigo->imagemurl='http://localhost/gersoft/backend/web/images/art_16.jpg';
        $this->assertTrue(($artigo->validate('imagemurl')));
        //validar estado
        $artigo->estado=null;
        $this->assertFalse($artigo->validate('estado'));
        $artigo->estado='asadfsdf';
        $this->assertFalse($artigo->validate('estado'));
        $artigo->estado=1.1;
        $this->assertFalse($artigo->validate('estado'));
        $artigo->estado=1;
        $this->assertTrue($artigo->validate('estado'));
        //validar iva
        $artigo->iva_id=null;
        $this->assertFalse($artigo->validate('iva_id'));
        $artigo->iva_id='sadgsdfg';
        $this->assertFalse($artigo->validate('iva_id'));
        $artigo->iva_id=1;
        $this->assertTrue($artigo->validate('iva_id'));
        //validar categoria
        $artigo->categoria_id=null;
        $this->assertFalse($artigo->validate('categoria_id'));
        $artigo->iva_id='sadgsdfg';
        $this->assertFalse($artigo->validate('categoria_id'));
        $artigo->iva_id=1;
        $this->assertTrue($artigo->validate('categoria_id'));
    }

    //criar artigo
    public function testCreateArtigo(){
        $artigo=new Artigo();
        $artigo->nome="teste unitário 1";
        $artigo->descricao="teste unitário 1";
        $artigo->referencia="124332";
        $artigo->preco="55.5";
        $artigo->data="2023-01-10 17:44:42";
        $artigo->imagem="art_16.jpg";
        $artigo->imagemurl="http://localhost/gersoft/backend/web/images/art_16.jpg";
        $artigo->estado=1;
        $artigo->iva_id=1;
        $artigo->categoria_id=1;
        $artigo->save();
    }

    //atualizar artigo
    public function testUpdateArtigo(){
        $artigo=$this->tester->grabRecord(['nome'=>'teste unitário 1']);
        $artigo->preco=55;
        $artigo->save();
        $this->tester->seeRecord('artigo', ['preco' => '55']);
    }

    //apagar registo
    public function testDeleteArtigo(){
        $artigo=$this->tester->grabRecord(['preco'=>'55']);
        $artigo->delete();
        $this->tester->dontSeeRecord('artigo',['preco'=>'55']);
    }
}
