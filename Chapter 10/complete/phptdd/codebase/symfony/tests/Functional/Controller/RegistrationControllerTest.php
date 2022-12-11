<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testCanLoadRegister(): void
    {
        $client     = static::createClient();
        $crawler    = $client->request('GET', '/register');

        $this->assertResponseIsSuccessful();
    }
}