<?php


namespace App\Tests;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{

    public function createAuthenticatedClient($username, $password)
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/login_check',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            json_encode(array(
                'username' => $username,
                'password' => $password,
            ))
        );

        $data = json_decode($client->getResponse()->getContent(), true);
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        return $client;
    }

    public function testAccessingProtectedRouteAuthenticatedClient(){

        $client = $this->createAuthenticatedClient('garcia@gmail.com', '123');
        $client->request('GET', '/api/measurements');
        $this->assertResponseIsSuccessful();
    }

    public function testAccesingProtectedRouteNoAuthenticatedClient(){

        $client = static::createClient();
        $client->request('GET', '/api/measurements');
        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

//    public function testRegisterUser(){
//
//        $client = static::createClient();
//        $client->request(
//            'POST',
//            '/register',
//            array(),
//            array(),
//            array('CONTENT_TYPE' => 'application/json'),
//            json_encode(array(
//                'email' => 'karla@gmail.com',
//                'password' => '123',
//            ))
//        );
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//    }

    public function testRegisterUserAlreadyExist(){

        $client = static::createClient();
        $client->request(
            'POST',
            '/register',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            json_encode(array(
                'email' => 'dimelo123@dimelo.com',
                'password' => '123',
            ))
        );

        $actualResponse = json_decode($client->getResponse()->getContent());
        $expectedResponse = json_decode('{"message": "User Already Exist","statusCode": 409}');

        $this->assertEquals($expectedResponse,$actualResponse);

    }

}