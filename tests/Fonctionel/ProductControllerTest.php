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

    public function TestH1()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertSelectorTextContains('H1', 'Brief test Symfony');
    }
    // recuperer le formulaires
    public function testRecupForm()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/fr/');
        $this->assertSelectorExists('#test');
        $submitButton = $crawler->selectButton('Envoyer');
       
        $form = $submitButton->form();

        $form['name'] = 'basket';
        $form['categorie'] = 'femme';
        $form['price'] = 'steffy';
        $form['stock'] = '12';

        //soumettre le formulaire
        $client->submit($form);
        //verifier le statut HTTP s
        // $this->assertResponseStatusCodeSame(302, $client->getResponse());
    }
}
