<?php


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicionesTipoVinoController extends WebTestCase
{
    public function testGetTiposVinosRequest(){
        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/tipos_vino');
        $this->assertEquals(200, $result->getResponse()->getStatusCode());
    }

    public function testGetTiposVinosResponse(){

        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/tipos_vino');

        $actualResponse = json_decode($result->getResponse()->getContent())[0];
        $expectedResponse = json_decode('{"id": 1,"nombre": "Tipo1"}');
        $this->assertEquals($expectedResponse, $actualResponse  );
    }
}