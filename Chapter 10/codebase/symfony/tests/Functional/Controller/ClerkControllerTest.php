<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClerkControllerTest extends WebTestCase
{
    public function testCanLoadIndex(): void
    {
        $client     = static::createClient();
        $client->request('GET', '/clerk');
        $this->assertResponseRedirects();
    }
}