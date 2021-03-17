<?php

namespace App\Entity;

use App\Repository\SensorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SensorRepository::class)
 */
class Sensor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $atributo1;

    /**
     * @ORM\Column(type="float")
     */
    private $atributo2;

    /**
     * @ORM\OneToOne(targetEntity=MedicionesVino::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicion;

    /**
     * @ORM\ManyToOne(targetEntity=TipoSensor::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo_sensor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtributo1(): ?float
    {
        return $this->atributo1;
    }

    public function setAtributo1(float $atributo1): self
    {
        $this->atributo1 = $atributo1;

        return $this;
    }

    public function getAtributo2(): ?float
    {
        return $this->atributo2;
    }

    public function setAtributo2(float $atributo2): self
    {
        $this->atributo2 = $atributo2;

        return $this;
    }

    public function getMedicion(): ?MedicionesVino
    {
        return $this->medicion;
    }

    public function setMedicion(MedicionesVino $medicion): self
    {
        $this->medicion = $medicion;

        return $this;
    }

    public function getTipoSensor(): ?TipoSensor
    {
        return $this->tipo_sensor;
    }

    public function setTipoSensor(?TipoSensor $tipo_sensor): self
    {
        $this->tipo_sensor = $tipo_sensor;

        return $this;
    }
}
