<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chef")
     */
    private $chef;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="Menu")
     */
    private $Category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Diet", inversedBy="Menu")
     */
    private $diet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Starter", mappedBy="menu")
     */
    private $Starter;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dish", mappedBy="menu")
     */
    private $Dish;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dessert", mappedBy="menu")
     */
    private $Dessert;

    public function __construct()
    {
        $this->Category = new ArrayCollection();
        $this->diet = new ArrayCollection();
        $this->Starter = new ArrayCollection();
        $this->Dish = new ArrayCollection();
        $this->Dessert = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getChef(): ?Chef
    {
        return $this->chef;
    }

    public function setChef(?Chef $chef): self
    {
        $this->chef = $chef;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->Category->contains($category)) {
            $this->Category->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Diet[]
     */
    public function getDiet(): Collection
    {
        return $this->diet;
    }

    public function addDiet(Diet $diet): self
    {
        if (!$this->diet->contains($diet)) {
            $this->diet[] = $diet;
        }

        return $this;
    }

    public function removeDiet(Diet $diet): self
    {
        if ($this->diet->contains($diet)) {
            $this->diet->removeElement($diet);
        }

        return $this;
    }

    /**
     * @return Collection|Starter[]
     */
    public function getStarter(): Collection
    {
        return $this->Starter;
    }

    public function addStarter(Starter $starter): self
    {
        if (!$this->Starter->contains($starter)) {
            $this->Starter[] = $starter;
            $starter->setMenu($this);
        }

        return $this;
    }

    public function removeStarter(Starter $starter): self
    {
        if ($this->Starter->contains($starter)) {
            $this->Starter->removeElement($starter);
            // set the owning side to null (unless already changed)
            if ($starter->getMenu() === $this) {
                $starter->setMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dish[]
     */
    public function getDish(): Collection
    {
        return $this->Dish;
    }

    public function addDish(Dish $dish): self
    {
        if (!$this->Dish->contains($dish)) {
            $this->Dish[] = $dish;
            $dish->setMenu($this);
        }

        return $this;
    }

    public function removeDish(Dish $dish): self
    {
        if ($this->Dish->contains($dish)) {
            $this->Dish->removeElement($dish);
            // set the owning side to null (unless already changed)
            if ($dish->getMenu() === $this) {
                $dish->setMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dessert[]
     */
    public function getDessert(): Collection
    {
        return $this->Dessert;
    }

    public function addDessert(Dessert $dessert): self
    {
        if (!$this->Dessert->contains($dessert)) {
            $this->Dessert[] = $dessert;
            $dessert->setMenu($this);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        if ($this->Dessert->contains($dessert)) {
            $this->Dessert->removeElement($dessert);
            // set the owning side to null (unless already changed)
            if ($dessert->getMenu() === $this) {
                $dessert->setMenu(null);
            }
        }

        return $this;
    }
}
