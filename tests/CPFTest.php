<?php
/**
 * Created by PhpStorm.
 * User: vinicius
 * Date: 24/01/2018
 * Time: 14:15
 */

namespace Vsilva472\phpCPFTest;

use PHPUnit_Framework_TestCase as PHPUnit;
use Vsilva472\phpCPF\CPF;

class CPFTest extends PHPUnit
{
    public function testShouldOnlyAcceptInputsWith11Digits(){
        $cpf = new CPF();
        $this->assertFalse($cpf->isLengthValid('cccccccccccccccccccccc'));
        $this->assertFalse($cpf->isLengthValid(5559999));
        $this->assertFalse($cpf->isLengthValid(null));
        $this->assertFalse($cpf->isLengthValid(''));
    }

    public function testShouldNotAcceptDummyValues(){
        $cpf = new CPF();
        $this->assertTrue($cpf->isDummyValue('99999999999'));
        $this->assertTrue($cpf->isDummyValue(00000000000));
    }

    public function testShouldOnlyAcceptValidCPFs()
    {
        $cpf = new CPF();
        $this->assertTrue($cpf->validate('77223126086'));
        $this->assertTrue($cpf->validate('772.231.260-86'));
        $this->assertFalse($cpf->validate('123.456.789.00'));
        $this->assertFalse($cpf->validate('32145699954'));
        $this->assertFalse($cpf->validate('32XXX.xxxxxsdfsdf456-5456sdf'));
    }
}
