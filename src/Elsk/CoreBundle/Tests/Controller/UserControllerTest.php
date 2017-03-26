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

    public function testRegisterLocalAdminDenial()
    {
    	$client = static::createClient();
    	$crawler = $client->request('POST', '/admin/register/localAdmin', ['email' => 'test3@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(500, $client->getResponse()->getStatusCode());
    	$this->assertTrue($crawler->filter('html:contains("The token storage contains no authentication token. One possible reason may be that there is no firewall configured for this URL. (500 Internal Server Error)")')->count() > 0);
    }
    
    public function testRegisterGlobalAdminDenial()
    {
    	$client = static::createClient();
    	$crawler = $client->request('POST', '/admin/register/globalAdmin', ['email' => 'test4@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(500, $client->getResponse()->getStatusCode());
    	$this->assertTrue($crawler->filter('html:contains("The token storage contains no authentication token. One possible reason may be that there is no firewall configured for this URL. (500 Internal Server Error)")')->count() > 0);
    }
    
    
}
