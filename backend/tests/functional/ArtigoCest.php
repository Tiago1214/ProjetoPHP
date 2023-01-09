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
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);

        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);
        //Mandar para a página de artigos
        $I->wait(2);
        $I->click('Artigos');
        $I->wait(2);
        $I->click('Visualizar Artigos');
        $I->wait(2);
        $I->click('Criar Artigo');
        $I->wait(2);

        $I->fillField('input[name="Artigo[nome]"]', 'teste');
        $I->wait(2);
        $I->fillField('input[name="Artigo[descricao]"]','teste de aceitacao');
        $I->wait(2);
        $I->fillField('input[name="Artigo[referencia]"]','234253462');
        $I->wait(2);
        $I->fillField('input[name="Artigo[preco]"]','435');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[iva_id]"]','1');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[categoria_id]"]','Carne');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[estado]"]','1');
        $I->wait(2);
        $I->click('Guardar');
        $I->wait(5);
    }
}
