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

    public function testGetFirstname()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $firstname = $this->getEntity()->getFirstname();
        $container->get('validator')->validate($escroc);

        $this->assertEquals($escroc->getFirstname(), $firstname);
    }

    public function testIsAdminIsBool()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $is_admin = $this->getEntity()->isIsAdmin();
        $container->get('validator')->validate($escroc);

        $this->assertIsBool($is_admin);
    }

    public function testPhoneIsInt()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $phone = $this->getEntity()->getPhone();
        $escroc->setPhone($phone);
        $container->get('validator')->validate($escroc);

        $this->assertIsInt($phone);
    }

    public function testEmailIsValid()
    {
        self::bootKernel();
        $container = static::getContainer();
        $escroc = $this->getEntity();
        $email = $this->getEntity()->getEmail();
        $container->get('validator')->validate($escroc);

        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
    }
}
