<?php

namespace App\Tests;

use App\Entity\Escroc;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EscrocTest extends KernelTestCase
{
    public function getEntity(): Escroc
    {
        return (new Escroc())
        ->setFirstname('keke')
        ->setLastname('ko')
        ->setEmail('keke@escroc.com')
        ->setAddress('1 rue de la Rue 30100 Alès')
        ->setPhone('0606060606')
        ->setIsAdmin(true);
    }

    public function testEntityIsValid()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $errors = $container->get('validator')->validate($escroc);

        $this->assertCount(0, $errors);
    }

    public function testNameIsValid()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $escroc->setFirstname('Sosso');
        $container->get('validator')->validate($escroc);

        $this->assertEmpty('');
    }

    public function testIsAdminIsValid()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $escroc->setIsAdmin(true);
        $container->get('validator')->validate($escroc);
    }
}
