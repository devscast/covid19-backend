<?php

namespace App\Tests\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MainControllerTest
 * @package App\Tests\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class MainControllerTest extends WebTestCase
{

    public function testRedirectToAdmin(): void
    {
        $client = self::createClient();
        $client->request('GET', '/');

        $this->assertResponseStatusCodeSame(Response::HTTP_MOVED_PERMANENTLY);
        $this->assertResponseHasHeader('Location');
    }

    public function testAdminIsRestricted(): void
    {
        $client = self::createClient();
        $client->request('GET', '/admin');
        $this->assertResponseRedirects('/login', 302);
    }
}
