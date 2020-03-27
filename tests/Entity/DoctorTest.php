<?php

namespace App\Tests\Entity;

use App\Entity\Doctor;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class DoctorTest
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class DoctorTest extends KernelTestCase
{
    use EntityTestCaseTrait;
    use FixturesTrait;

    public function getEntity(): Doctor
    {
        return (new Doctor())
            ->setName('Mutoke')
            ->setNumber('+243000000000')
            ->setProfile('https://link.com/avatar.jpg')
            ->setRegion('Lubumbashi - Haut-katanga');
    }

    public function testValidEntity(): void
    {
        $this->loadFixtureFiles([dirname(__DIR__) . '/fixtures/doctor.yaml']);
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testInvalidNonUniqueEntity(): void
    {
        $this->loadFixtureFiles([dirname(__DIR__) . '/fixtures/doctor.yaml']);
        $this->assertHasError($this->getEntity()->setName('bernard'), 1);
    }

    public function testInvalidBlankNameEntity(): void
    {
        $this->assertHasError($this->getEntity()->setName(''), 2);
    }

    public function testInvalidLengthNameEntity(): void
    {
        $this->assertHasError($this->getEntity()->setName('to'), 1);
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

    public function testInvalidUrlProfileEntity(): void
    {
        $this->assertHasError($this->getEntity()->setProfile('invalid'), 1);
    }

    public function testOptionalProfileEntity(): void
    {
        $this->assertHasError($this->getEntity()->setProfile(''), 0);
    }

    public function testInvalidBlankRegionEntity(): void
    {
        $this->assertHasError($this->getEntity()->setRegion(''), 2);
    }

    public function testInvalidLengthRegionEntity(): void
    {
        $this->assertHasError($this->getEntity()->setRegion('kasa'), 1);
    }
}
