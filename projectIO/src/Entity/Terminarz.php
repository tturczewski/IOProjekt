<?php

namespace App\Entity;

use App\Repository\TerminarzRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TerminarzRepository::class)
 */
class Terminarz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $termin_rozpoczecia;

    /**
     * @ORM\Column(type="date")
     */
    private $termin_zakonczenia;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $klient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerminRozpoczecia(): ?\DateTimeInterface
    {
        return $this->termin_rozpoczecia;
    }

    public function setTerminRozpoczecia(\DateTimeInterface $termin_rozpoczecia): self
    {
        $this->termin_rozpoczecia = $termin_rozpoczecia;

        return $this;
    }

    public function getTerminZakonczenia(): ?\DateTimeInterface
    {
        return $this->termin_zakonczenia;
    }

    public function setTerminZakonczenia(\DateTimeInterface $termin_zakonczenia): self
    {
        $this->termin_zakonczenia = $termin_zakonczenia;

        return $this;
    }

    public function getKlient(): ?string
    {
        return $this->klient;
    }

    public function setKlient(?string $klient): self
    {
        $this->klient = $klient;

        return $this;
    }
}
