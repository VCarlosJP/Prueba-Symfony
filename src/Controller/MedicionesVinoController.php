<?php


namespace App\Controller;


use App\Entity\MedicionesVino;
use App\Repository\MedicionesTipoVinoRepository;
use App\Repository\MedicionesVariedadVinoRepository;
use App\Repository\MedicionesVinoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MedicionesVinoController extends AbstractController
{
    private $medicionesVinoRepository;
    private $medicionesTipoVinoRepository;
    private $medicionesVariedadVinoRepository;
    private $entityManager;

    public function __construct(
        MedicionesVinoRepository $medicionesVinoRepository,
        MedicionesTipoVinoRepository $medicionesTipoVinoRepository,
        MedicionesVariedadVinoRepository $medicionesVariedadVinoRepository,
        EntityManagerInterface $entityManager){

        $this->medicionesVinoRepository = $medicionesVinoRepository;
        $this->medicionesTipoVinoRepository = $medicionesTipoVinoRepository;
        $this->medicionesVariedadVinoRepository = $medicionesVariedadVinoRepository;
        $this->entityManager = $entityManager;
    }

    public function getMeasurements(){
        $measurements = $this->medicionesVinoRepository->findAllMeasurements();
        return $this->json($measurements, 200);
    }

    public function addMeasurement(Request $request){

        $data = json_decode($request->getContent(), true);

        $user = $this->getUser();
        $variedad = $this->medicionesVariedadVinoRepository->findOneBy(['id'=>$data['variedad']]);
        $tipo = $this->medicionesTipoVinoRepository->findOneBy(['id'=>$data['tipo']]);

        $measurement = new MedicionesVino();
        $measurement
            ->setAno($data['ano'])
            ->setColor($data['color'])
            ->setTemperatura($data['temperatura'])
            ->setGraduacion($data['graduacion'])
            ->setPh($data['ph'])
            ->setObservaciones($data['observaciones'])
            ->setUsuario($user)
            ->setVariedad($variedad)
            ->setTipo($tipo);


        $this->entityManager->persist($measurement);
        $this->entityManager->flush();

        return new JsonResponse(['message'=>'Measurement Created Succesfully', 'statusCode'=>200]);
    }


}