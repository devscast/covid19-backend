<?php

namespace App\Tests\Services;

use App\Services\JHUAPIService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class JHUApiServiceTest
 * @package App\Tests\Services
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class JHUAPIServiceTest extends KernelTestCase
{

    public function testApiServiceUrlIsDefined(): void
    {
        $this->assertClassHasStaticAttribute('url', JHUAPIService::class);
    }

    public function testApiServiceUrlIsStored(): void
    {
        $this->assertEquals('https://covid19.mathdro.id/api', JHUAPIService::$url);
    }
}
