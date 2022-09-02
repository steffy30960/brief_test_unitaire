<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testProductController(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        //test de la connexion
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function TestH1(){

        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertSelectorTextContains('H1','Brief test Symfony');
    }
}
