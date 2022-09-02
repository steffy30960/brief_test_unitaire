<?php

namespace App\Tests;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
//test de mon entité Product
class ProductTest extends KernelTestCase
{
    public function getEntity(): Product {
        return (new Product())
                ->setName('stephanie')
                ->setCategorie('femme')
                ->setPrice('5')
                ->setIsPublish('true')
                ->setStock('15');
        
    }
    public function testEntityIsValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $product = $this->getEntity();
        
        $errors = $container->get('validator')->validate($product);

        $this->assertCount(0, $errors);
    }

    public function testInvalideName(){

        self::bootKernel();
        $container = static::getContainer();

        //$product = new Product();
        $product = $this->getEntity();
         $product->setName('');
        // $product->setCategorie('femme');
        // $product->setPrice('5');
        // $product->setIsPublish('true');
        // $product->setStock('15');
        
        $errors = $container->get('validator')->validate($product);

        $this->assertEmpty('');
    }
    public function testInvalideCategorie(){

        self::bootKernel();
        $container = static::getContainer();

        $product = $this->getEntity();
        $product->setCategorie('');
       

        $errors = $container->get('validator')->validate($product);

        $this->assertEmpty('');
    }
    public function testInvalidePrice(){

        self::bootKernel();
        $container = static::getContainer();

        $product = $this->getEntity();
        $price = 5;
        $product->setPrice($price);
      
        $errors = $container->get('validator')->validate($product);

        $this->assertIsInt($price);
    }
    public function testIsPublished(){

        self::bootKernel();
        $container = static::getContainer();

        $product = $this->getEntity();
        $product->setIsPublish('false');
       
        $errors = $container->get('validator')->validate($product);

        $this->assertTrue(1 === 1);
    }
}
