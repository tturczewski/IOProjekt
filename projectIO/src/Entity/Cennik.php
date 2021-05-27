<?php

namespace App\Entity;

use App\Repository\CennikRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CennikRepository::class)
 */
class Cennik
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nazwa_uslugi;

    /**
     * @ORM\Column(type="float")
     */
    private $cena_m2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaUslugi(): ?string
    {
        return $this->nazwa_uslugi;
    }

    public function setNazwaUslugi(string $nazwa_uslugi): self
    {
        $this->nazwa_uslugi = $nazwa_uslugi;

        return $this;
    }

    public function getCenaM2(): ?float
    {
        return $this->cena_m2;
    }

    public function setCenaM2(float $cena_m2): self
    {
        $this->cena_m2 = $cena_m2;

        return $this;
    }
}
