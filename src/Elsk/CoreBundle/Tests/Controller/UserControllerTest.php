<?php

namespace Elsk\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class UserControllerTest extends WebTestCase
{
	private $client = null;
	public function setUp()
	{
		$this->client = static::createClient();
	}
	
    public function testRegisterRecipient()
    {
        $crawler = $this->client->request('POST', '/register/recipient', ['email' => 'test@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals($crawler->text(),"User created");
    }
    
    public function testRegisterVolunteer()
    {
    	$crawler = $this->client->request('POST', '/register/volunteer', ['email' => 'test2@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    	$this->assertEquals($crawler->text(),"User created");
    }

    public function testRegisterLocalAdminDenial()
    {
    	$crawler = $this->client->request('POST', '/admin/register/localAdmin', ['email' => 'test3@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(401, $this->client->getResponse()->getStatusCode());
    }
    
    public function testRegisterGlobalAdminDenial()
    {
    	$crawler = $this->client->request('POST', '/admin/register/globalAdmin', ['email' => 'test4@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(401, $this->client->getResponse()->getStatusCode());
    }
    
    public function testRegisterLocalAdmin()
    {
    	$this->superAdminLogin();
    	$crawler = $this->client->request('POST', '/admin/register/localAdmin', ['email' => 'test3@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    	$this->assertEquals($crawler->text(),"User created");
    }
    
    public function testRegisterGlobalAdmin()
    {
    	$this->superAdminLogin();
    	$crawler = $this->client->request('POST', '/admin/register/globalAdmin', ['email' => 'test4@test.dk',"password"=>"test1234!","firstName"=>"bob","lastName"=>"bobson","phone"=>"12345678","elskCity"=>"Aarhus"]);
    	$this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    	$this->assertEquals($crawler->text(),"User created");
    }
    
    
    private function superAdminLogin()
    {
    	$this->client = static::createClient(array(), array(
    			'PHP_AUTH_USER' => 'superAdmin',
    			'PHP_AUTH_PW'   => 'superAdminPass',
    	));
    }
}
