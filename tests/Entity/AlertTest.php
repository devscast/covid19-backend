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

    public function testValidEntity(): void
    {
        $alert = (new Alert())
            ->setNumber('+243997020810')
            ->setLat('6.49405')
            ->setSymptoms('some info')
            ->setLng('-11.40900')
            ->setCreatedAt(new \DateTime('now'))
            ->setInfos('some info');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($alert);

        $this->assertCount(0, $error);
    }
}
