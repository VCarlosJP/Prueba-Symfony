<?php

namespace App\Entity;

use App\Repository\MedicionesVinoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicionesVinoRepository::class)
 */
class MedicionesVino
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ano;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="smallint")
     */
    private $temperatura;

    /**
     * @ORM\Column(type="smallint")
     */
    private $graduacion;

    /**
     * @ORM\Column(type="float")
     */
    private $ph;

    /**
     * @ORM\Column(type="text")
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=MedicionesVariedadVino::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $variedad;

    /**
     * @ORM\ManyToOne(targetEntity=MedicionesTipoVino::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getTemperatura(): ?int
    {
        return $this->temperatura;
    }

    public function setTemperatura(int $temperatura): self
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    public function getGraduacion(): ?int
    {
        return $this->graduacion;
    }

    public function setGraduacion(int $graduacion): self
    {
        $this->graduacion = $graduacion;

        return $this;
    }

    public function getPh(): ?float
    {
        return $this->ph;
    }

    public function setPh(float $ph): self
    {
        $this->ph = $ph;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getVariedad(): ?MedicionesVariedadVino
    {
        return $this->variedad;
    }

    public function setVariedad(?MedicionesVariedadVino $variedad): self
    {
        $this->variedad = $variedad;

        return $this;
    }

    public function getTipo(): ?MedicionesTipoVino
    {
        return $this->tipo;
    }

    public function setTipo(?MedicionesTipoVino $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
