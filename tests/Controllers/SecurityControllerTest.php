<?php

namespace App\Tests\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SecurityControllerTest
 * @package App\Tests\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class SecurityControllerTest extends WebTestCase
{


    public function testDisplayLogin(): void
    {
        $client = self::createClient();
        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'Login');
        $this->assertSelectorNotExists('text-red-900');
    }

    /*public function testLoginWithBadCredentials(): void
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Envoyer')->form([
            'email' => 'test@test.com',
            'password' => '|=^K39A$5w0r)'
        ]);

        $client->submit($form);
        $this->assertResponseRedirects('/login');
        $client->followRedirect();
        $this->assertSelectorExists('text-red-900');
    }*/

    /*public function testSuccessfulLogin(): void
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Envoyer')->form([
            'email' => 'test@test.com',
            'password' => '000000'
        ]);

        $client->submit($form);
        $this->assertResponseRedirects('http://localhost/admin');
    }*/

    public function testLogoutUrlRedirectToLogin(): void
    {
        $client = self::createClient();
        $client->request('GET', '/logout');
        $this->assertResponseRedirects('http://localhost/login', 302);
    }
}
