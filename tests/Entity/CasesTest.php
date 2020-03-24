<?php

namespace App\Tests\Entity;

use App\Entity\Cases;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CasesTest
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class CasesTest extends KernelTestCase
{

    use EntityTestCaseTrait;

    public function getEntity(): Cases
    {
        return (new Cases())
            ->setConfirmed(0)
            ->setRecovered(0)
            ->setDeaths(0);
    }

    public function testValidEntity(): void
    {
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testValidNumbersEntity(): void
    {
        $this->assertHasError($this->getEntity()->setRecovered(10), 0);
        $this->assertHasError($this->getEntity()->setConfirmed(1000), 0);
        $this->assertHasError($this->getEntity()->setDeaths(190), 0);
    }

    public function testInvalidBlankEntity(): void
    {
        $this->assertHasError($this->getEntity()->setRecovered(''), 1);
        $this->assertHasError($this->getEntity()->setConfirmed(''), 1);
        $this->assertHasError($this->getEntity()->setDeaths(''), 1);
    }

    public function testInvalidNumbersEntity(): void
    {
        $this->assertHasError($this->getEntity()->setRecovered('cinq'), 1);
        $this->assertHasError($this->getEntity()->setConfirmed('quatre'), 1);
        $this->assertHasError($this->getEntity()->setDeaths('trois'), 1);
    }
}
