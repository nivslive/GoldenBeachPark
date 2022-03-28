<?php

namespace Template\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * 
 * @Entity
 * @Table(name="acomodacao")
 * 
 */

class Acomodacao {



    /**
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     * 
     */
    private $id;

    /**
     *  @Column(type="string", length=200)
     * 
     */
    private $title;

    /**
     *  @Column(type="string", length=2500, nullable=true)
     * 
     */
    private $subtitle;

    /**
     * @ORM\OneToMany(targetEntity="ItensAcomodacao", mappedBy="acomodacao_id")
     */
    private $itens;

    /**
     *  @Column(type="string", nullable=true)
     * 
     */
    private $image;




    public function __construct(){
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
     * Get the value of subtitle
     */ 
    public function getSubtitle():string
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle(string $subtitle):self
    {
        $this->subtitle = $subtitle;

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
    public function setItens(Collection $itens): self
    {
        $this->itens = $itens;

        return $this;
    }


    public function addItem(ItensAcomodacao $item):self
    {
        $this->itens->add($item);
        $item->setAcomodacao($this);

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage():?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage(string $image):self
    {
        $this->image = $image;

        return $this;
    }
}