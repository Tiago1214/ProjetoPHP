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
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);

        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);
        //Mandar para a página de perfis
        $I->wait(2);

        $I->click('Utilizadores');
        $I->wait(3);
        $I->click('Visualizar todos os Utilizadores');
        $I->wait(3);

        $I->click('Criar Utilizador');

        $I->fillField('input[name="CriarUsers[username]"]', 'testefuncional');
        $I->wait(2);
        $I->fillField('input[name="CriarUsers[email]"]', 'testefuncional@gmail.com');
        $I->wait(2);
        $I->fillField('input[name="CriarUsers[numcontribuinte]"]', '222456123');
        $I->wait(2);
        $I->fillField('input[name="CriarUsers[telemovel]"]', '916574367');
        $I->wait(2);
        //$I->fillField('select[name="Pedido[mesa_id]"]','1');
        $I->executeJS('document.getElementById("criarusers-role").value=0');
        $I->wait(2);
        $I->fillField('input[name="CriarUsers[password]"]','12345678');
        $I->wait(2);
        $I->click('Criar Conta');
        $I->wait(2);
    }
}
