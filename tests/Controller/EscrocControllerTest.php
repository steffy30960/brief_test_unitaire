<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class EscrocControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', 'https://127.0.0.1:8000/fr/escroc');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testH1Welcome()
    {
        $client = static::createClient();
        $client->request('GET', 'https://127.0.0.1:8000/fr/escroc');
        $this->assertSelectorTextContains('H1', '骗子和坏蛋欢迎你 ！');
    }

    public function testRedirectToLogin()
    {
        $client = static::createClient();
        $client->request('GET', 'https://127.0.0.1:8000/fr/auth');
        $this->assertResponseRedirects('https://127.0.0.1:8000/fr/login');
    }
}
