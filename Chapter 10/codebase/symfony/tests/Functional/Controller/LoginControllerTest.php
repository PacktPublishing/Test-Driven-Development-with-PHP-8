<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testCanLoadLogin(): void
    {
        $client     = static::createClient();
        $crawler    = $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
    }
}