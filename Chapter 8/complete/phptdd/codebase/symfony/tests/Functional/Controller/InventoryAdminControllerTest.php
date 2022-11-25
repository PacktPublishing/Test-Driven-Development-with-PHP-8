<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InventoryAdminControllerTest extends WebTestCase
{
    public function testCanLoadIndex(): void
    {
        $client     = static::createClient();
        $client->request('GET', '/inventory-admin');
        $this->assertResponseIsSuccessful();
    }
}