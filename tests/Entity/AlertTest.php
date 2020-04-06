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
            ->setInfos('some info')
            ->setSex('M')
            ->setAge(34)
            ->setWellKnownCenter(false)
            ->setInfectedRelatives(false)
            ->setGesturesBarriersLevel('3');
    }

    public function testValidEntity(): void
    {
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testHighGesturesBarriersLevelEntity(): void
    {
        $this->assertHasError(
            $this->getEntity()->setGesturesBarriersLevel('0'),
            1
        );
        $this->assertHasError(
            $this->getEntity()->setGesturesBarriersLevel('-6'),
            1
        );
        $this->assertHasError(
            $this->getEntity()->setGesturesBarriersLevel('9'),
            1
        );
        $this->assertHasError(
            $this->getEntity()->setGesturesBarriersLevel('16'),
            1
        );
    }

    public function testStringToBooleanEntity(): void
    {
        $this->assertHasError(
            $this->getEntity()->setWellKnownCenter('1'),
            0
        );
        $this->assertHasError(
            $this->getEntity()->setWellKnownCenter('0'),
            0
        );
        $this->assertHasError(
            $this->getEntity()->setInfectedRelatives('0'),
            0
        );
    }

    public function testValidSexEntity(): void
    {
        $this->assertHasError($this->getEntity()->setSex('M'), 0);
        $this->assertHasError($this->getEntity()->setSex('F'), 0);
    }

    public function testInvalidSexEntity(): void
    {
        $this->assertHasError($this->getEntity()->setSex('FM'), 1);
        $this->assertHasError($this->getEntity()->setSex(null), 1);
    }

    public function testInvalidBlankSexEntity(): void
    {
        $this->assertHasError($this->getEntity()->setSex(''), 2);
    }

    public function testInvalidBlankAgeEntity(): void
    {
        $this->assertHasError($this->getEntity()->setAge(null), 1);
        $this->expectException(\TypeError::class);
        $this->assertHasError($this->getEntity()->setAge(''), 1);
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
