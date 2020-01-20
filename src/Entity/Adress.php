<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zip")
     */
    private $zip;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Street")
     */
    private $street;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?Zip
    {
        return $this->zip;
    }

    public function setZip(?Zip $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getStreet(): ?Street
    {
        return $this->street;
    }

    public function setStreet(?Street $street): self
    {
        $this->street = $street;

        return $this;
    }
}
