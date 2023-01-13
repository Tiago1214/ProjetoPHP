<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class IvaCest
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

    public function createIva(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'tiago');
        $I->fillField('LoginForm[password]', '12345678');

        $I->click('Iniciar Sessão');

        $I->click('Ivas');

        $I->click('Criar Iva');


        $I->fillField('Iva[descricao]','teste funcional');
        $I->fillField('Iva[taxaiva]','5');
        $I->selectOption('Iva[estado]','1');

        $I->click('Guardar');

    }
}
