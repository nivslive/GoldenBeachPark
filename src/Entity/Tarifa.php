<?php

namespace Template\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * 
 * @Entity
 * @Table(name="tarifa")
 * 
 */
class Tarifa {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * 
     * @Column(type="string")
     * 
     */
    private $title;




    /**
     * 
     * @OneToMany(targetEntity="ItensTarifa", mappedBy="tarifa", cascade={"remove", "persist"})
     * @JoinColumn(name="tarifa", referencedColumnName="tarifa", onDelete="CASCADE")
     */
    private $itens;



    public function __construct()
    {
        $this->itens = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle():string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title):self
    {
        $this->title = $title;

        return $this;
    }



    

    /**
     * Get the value of itens
     */ 
    public function getItens(): Collection
    {
        return $this->itens;
    }

    /**
     * Set the value of itens
     *
     * @return  self
     */ 
    public function setItens(Collection $itens):self
    {
        $this->itens = $itens;

        return $this;
    }

   

    public function addItem(ItensTarifa $item):self
    {
        $this->itens[] = $item;
        $item->setTarifa($this);

        return $this;
    }
}