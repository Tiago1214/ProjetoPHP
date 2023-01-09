<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class ProfileCest
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

    public function createPedido(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'tiago');
        $I->fillField('LoginForm[password]', '12345678');
        $I->click('Iniciar Sessão');
        //Mandar para a página de perfis

        $I->click('Utilizadores');

        $I->click('Visualizar todos os Utilizadores');


        $I->click('Criar Utilizador');

        $I->fillField('CriarUsers[username]', 'testefuncional');

        $I->fillField('CriarUsers[email]', 'testefuncional@gmail.com');

        $I->fillField('CriarUsers[numcontribuinte]', '222456123');

        $I->fillField('CriarUsers[telemovel]', '916574367');

        $I->selectOption('CriarUsers[role]','1');

        $I->fillField('CriarUsers[password]','12345678');

        $I->click('Criar Conta');

    }
}
