<?php


namespace App\Tests;


use App\Entity\MedicionesVino;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicionesVinoControllerTest extends WebTestCase
{
    public function testGetMeasurementsRequest(){
        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/measurements');
        $this->assertEquals(200, $result->getResponse()->getStatusCode());
    }

    public function testGetExpectedMeasurements(){

        $data = '{"id": 2,"ano": 1982,"color": "Rojo","temperatura": 22,"graduacion": 12,"ph": 4,"observaciones": "Observaciones322","variedad": {"id": 1,"nombre": "Variedad1"},"tipo": {"id": 1,"nombre": "Tipo1"}}';
        $expectedResponse = json_decode($data);

        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request('GET', '/api/measurements');
        $actualResponse = json_decode($result->getResponse()->getContent())[0];
        $this->assertEquals($expectedResponse, $actualResponse  );

    }

    public function testAddMeasurement(){
        $client = new UserControllerTest();
        $result = $client->createAuthenticatedClient('garcia@gmail.com', '123');
        $result->request(
            'POST',
            '/api/measurements',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            json_encode(array(
                'ano' => 1982,
                'color' => 'verde',
                'temperatura' => 22,
                'graduacion' => 10,
                'ph' => 7,
                'observaciones' => 'Lorem Ipsum',
                'variedad' => 1,
                'tipo' => 1,
            ))
        );

        $actualResponse = json_decode($result->getResponse()->getContent());
        $expectedResponse = json_decode('{"message": "Measurement Created Succesfully","statusCode": 200}');

        $this->assertEquals($expectedResponse, $actualResponse  );
    }
}