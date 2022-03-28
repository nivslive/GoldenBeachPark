<?php

namespace Template\Entity;


/**
 * 
 * @Entity
 * @Table(name="itens_tarifa")
 * 
 */
class ItensTarifa {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
       /**
     *  @Column(type="string", length=200)
     * 
     */
    private $title;


        /**
     * 
     * @ManyToOne(targetEntity="Tarifa")
     * 
     */
    private $tarifa;



    /**
     *  @Column(type="string", length=2000)
     * 
     */
    private $description;

    
      /**
     *  @Column(type="string", length=200)
     * 
     */
    private $image;





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
     * Get the value of tarifas
     */ 
    public function getTarifa():Tarifa
    {
        return $this->tarifa;
    }

    /**
     * Set the value of tarifas
     *
     * @return  self
     */ 
    public function setTarifa(Tarifa $tarifa):self
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage():string
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

    /**
     * Get the value of description
     */ 
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }
}