<?php


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicionesVariedadesVinoControllerTest extends WebTestCase
{
    public function testGetVariedadesVinosRequest(){
        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/variedades_vino');
        $this->assertEquals(200, $result->getResponse()->getStatusCode());
    }

    public function testGetVariedadesVinosResponse(){

        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/variedades_vino');

        $actualResponse = json_decode($result->getResponse()->getContent())[0];
        $expectedResponse = json_decode('{"id": 1,"nombre": "Variedad1"}');
        $this->assertEquals($expectedResponse, $actualResponse  );
    }
}