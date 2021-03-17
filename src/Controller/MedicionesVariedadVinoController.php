<?php


namespace App\Controller;


use App\Repository\MedicionesVariedadVinoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedicionesVariedadVinoController extends AbstractController
{
    private $medicionesVariedadVinoRepository;

    public function __construct(MedicionesVariedadVinoRepository $medicionesVariedadVinoRepository)
    {
        $this->medicionesVariedadVinoRepository = $medicionesVariedadVinoRepository;
    }

    public function getVariedadesVino(){
        $variedades = $this->medicionesVariedadVinoRepository->findAll();
        return $this->json($variedades, 200);
    }
}