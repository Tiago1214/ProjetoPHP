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
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);

        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);
        //Mandar para a página de ivas
        $I->wait(2);

        $I->click('Ivas');
        $I->wait(2);

        $I->click('Criar Iva');
        $I->wait(2);

        $I->fillField('input[name="Iva[descricao]"]','teste funcional');
        $I->wait(2);
        $I->fillField('input[name="Iva[taxaiva]"]','5');
        $I->wait(2);
        $I->fillField('select[name="Iva[estado]"]','1');
        $I->wait(2);

        $I->click('Guardar');

        $I->wait('2');
    }
}
