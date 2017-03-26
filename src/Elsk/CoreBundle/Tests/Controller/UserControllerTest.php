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
    
    public function testRegisterVolunteer()
    {
    	$client = static::createClient();
    
    	$crawler = $client->request('POST', '/register/volunteer', ['email' => 'test2@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals($crawler->text(),"User created");
    }
    
    public function testRegisterLocalAdmin()
    {
    	$client = static::createClient();
    
    	$crawler = $client->request('POST', '/admin/register/localAdmin', ['email' => 'test3@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals($crawler->text(),"User created");
    }
    
    public function testRegisterGlobalAdmin()
    {
    	$client = static::createClient();
    
    	$crawler = $client->request('POST', '/admin/register/globalAdmin', ['email' => 'test4@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals($crawler->text(),"User created");
    }
}
