<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DietRepository")
 */
class Diet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Menu", mappedBy="diet")
     */
    private $Menu;

    public function __construct()
    {
        $this->Menu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenu(): Collection
    {
        return $this->Menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->Menu->contains($menu)) {
            $this->Menu[] = $menu;
            $menu->addDiet($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->Menu->contains($menu)) {
            $this->Menu->removeElement($menu);
            $menu->removeDiet($this);
        }

        return $this;
    }
}
