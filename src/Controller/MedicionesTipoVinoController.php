<?php


namespace App\Controller;

use App\Repository\MedicionesTipoVinoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedicionesTipoVinoController extends AbstractController
{
    private $medicionesTipoVinoRepository;

    public function __construct(MedicionesTipoVinoRepository $medicionesTipoVinoRepository)
    {
        $this->medicionesTipoVinoRepository = $medicionesTipoVinoRepository;
    }

    public function getTiposVino(){
        $tipos = $this->medicionesTipoVinoRepository->findAll();
        return $this->json($tipos, 200);
    }
}