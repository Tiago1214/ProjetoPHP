<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class ArtigoCest
{
    /**
     * @param FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
    }

    protected function _after(FunctionalTester $I)
    {
    }

    public function createArtigo(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'tiago');
        $I->fillField('LoginForm[password]', '12345678');
        $I->click('Iniciar Sessão');

        $I->click('Artigos');
        $I->click('Visualizar Artigos');
        $I->click('Criar Artigo');


        $I->fillField('Artigo[nome]', 'teste');
        $I->fillField('Artigo[descricao]','teste de aceitacao');
        $I->fillField('Artigo[referencia]','234253462');
        $I->fillField('Artigo[preco]','435');
        $I->selectOption('Artigo[iva_id]','2');
        $I->selectOption('Artigo[categoria_id]','Carne');
        $I->selectOption('Artigo[estado]','1');
        $I->click('Guardar');
    }
}
