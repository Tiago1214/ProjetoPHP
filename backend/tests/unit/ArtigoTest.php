<?php

namespace backend\tests\unit;

use backend\tests\UnitTestCase;
use common\models\Artigo;

class ArtigoTest extends UnitTestCase
{
    public function testCreateArtigo()
    {
        $artigo = new Artigo();
        $artigo->nome = 'teste';
        $artigo->descricao = 'teste1';
        $artigo->referencia = '12234235';
        $artigo->quantidade = '235';
        $artigo->preco = '222';
        $artigo->data = '2022-12-26 16:56:00';
        $artigo->imagem = 'art_19.jpg';
        $artigo->imagemurl = 'http://localhost/gersoft/backend/web/images/art_19.jpg';
        $artigo->estado = '1';
        $artigo->iva_id = '1';
        $artigo->categoria_id = '1';

        $this->assertTrue($artigo->save());

    }
}
