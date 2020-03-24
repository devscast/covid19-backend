<?php

namespace App\Tests\Entity;

use App\Entity\Alert;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class AlertTest
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class AlertTest extends KernelTestCase
{

    use EntityTestCaseTrait;

    public function getEntity(): Alert
    {
        return (new Alert())
            ->setNumber('+243997020810')
            ->setLat('27.460640')
            ->setLng('-11.632240')
            ->setSymptoms('some info')
            ->setCreatedAt(new \DateTime('now'))
            ->setInfos('some info');
    }

    public function testValidEntity(): void
    {
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testInvalidBlankNumberEntity(): void
    {
        $this->assertHasError($this->getEntity()->setNumber(''), 2);
    }

    public function testInvalidLengthNumberEntity(): void
    {
        $this->assertHasError($this->getEntity()->setNumber('100'), 1);
        $this->assertHasError($this->getEntity()->setNumber('11111111111111'), 1);
    }

    public function testInvalidBlankSymptomsEntity(): void
    {
        $this->assertHasError($this->getEntity()->setSymptoms(''), 1);
    }

    public function testValidLatLngEntity(): void
    {
        $this->assertHasError(
            $this->getEntity()->setLat('-4.441931')->setLng('15.266293'),
            0
        );
    }

    public function testInvalidLatLngEntity(): void
    {
        $this->assertHasError(
            $this->getEntity()->setLat('invalid')->setLng('od'),
            2
        );
    }

    public function testInvalidBlankLatLngEntity(): void
    {
        $this->assertHasError(
            $this->getEntity()->setLat('')->setLng('15.266293'),
            1
        );
    }
}
