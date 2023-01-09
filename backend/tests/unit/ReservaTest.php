<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Reserva;

class ReservaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // validações
    public function testValidation()
    {
        //criar reserva
        $reserva=new Reserva();

        //validar data
        $reserva->data=null;
        $this->assertFalse($reserva->validate('data'));
        $reserva->data='dsfgdsfgdf';
        $this->assertTrue($reserva->validate('data'));
        //validar hora
        $reserva->hora=null;
        $this->assertFalse($reserva->validate('hora'));
        $reserva->hora='12:30';
        $this->assertTrue($reserva->validate('hora'));
        //validar numero de pessoas
        $reserva->nrpessoas=null;
        $this->assertFalse($reserva->validate('nrpessoas'));
        $reserva->nrpessoas='dfsdgsfdg';
        $this->assertFalse($reserva->validate('nrpessoas'));
        $reserva->nrpessoas=6;
        $this->assertTrue($reserva->validate('nrpessoas'));
        //validar estado
        $reserva->estado=null;
        $this->assertFalse($reserva->validate('estado'));
        $reserva->estado='sdgsdgdfg';
        $this->assertFalse($reserva->validate('estado'));
        $reserva->estado=1;
        $this->assertTrue($reserva->validate('estado'));
        //validar profile_id
        $reserva->profile_id=null;
        $this->assertFalse($reserva->validate('profile_id'));
        $reserva->profile_id='asdagsgssf';
        $this->assertFalse($reserva->validate('profile_id'));
        $reserva->profile_id=1;
        $this->assertTrue($reserva->validate('profile_id'));
    }

    //criar,editar e eliminar reserva
    public function testReservaCreate(){
        $reserva=new Reserva();

        $reserva->data='12/03/2250';
        $reserva->hora='20:30';
        $reserva->nrpessoas=999;
        $reserva->estado=1;
        $reserva->profile_id=2;
        $reserva->save();
        //update
        $reserva=$this->tester->grabRecord('common\models\Reserva',['nrpessoas'=>999]);
        $reserva->nrpessoas=1000;
        $reserva->save();
        //delete
        $this->tester->seeRecord('common\models\Reserva', ['nrpessoas' => 1000]);
        $reserva=$this->tester->grabRecord('common\models\Reserva',['nrpessoas' => 1000]);
        $reserva->delete();
        $this->tester->dontSeeRecord('common\models\Reserva',['nrpessoas' => 1000]);
    }
}
