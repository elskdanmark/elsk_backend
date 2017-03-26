<?php

namespace Elsk\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testRegisterRecipient()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/register/recipient', ['email' => 'test@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
        $this->assertEquals($crawler->text(),"User created");
    }
}
