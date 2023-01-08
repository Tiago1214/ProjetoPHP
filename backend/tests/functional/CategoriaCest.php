<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\CategoriaFixture;

/**
 * Class LoginCest
 */
class CategoriaCest
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

    public function createCategoria(FunctionalTester $I)
    {
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);

        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);
        //Mandar para a página de categorias
        $I->wait(2);

        $I->click('Categorias');
        $I->wait(2);

        $I->click('Criar Categoria');
        $I->wait(2);

        $I->fillField('input[name="Categoria[nome]"]','teste');
        $I->wait(2);

        $I->fillField('input[name="Categoria[descricao]"]','teste');
        $I->wait(2);

        $I->fillField('select[name="Categoria[estado]"]','1');
        $I->wait(2);

        $I->click('Guardar');

        $I->wait('2');
    }
}
