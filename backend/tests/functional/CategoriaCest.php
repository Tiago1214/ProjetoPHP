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
        $I->fillField('LoginForm[username]', 'tiago');

        $I->fillField('LoginForm[password]', '12345678');

        $I->click('Iniciar Sessão');
        //Mandar para a página de categorias

        $I->click('Categorias');

        $I->click('Criar Categoria');

        $I->fillField('Categoria[nome]','teste');

        $I->fillField('Categoria[descricao]','teste');

        $I->selectOption('Categoria[estado]','1');

        $I->click('Guardar');
    }
}
