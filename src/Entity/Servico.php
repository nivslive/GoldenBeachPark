<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="servico")
 * 
 */
class Servico {

     /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(type="string", length=2000)
     */
    private $description;
    
    /**
     * @Column(type="string", length=2000)
     */
    private $image;


    
    /**
     * Get the value of depoimento
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set the value of depoimento
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }



    
    /**
     * Get the value of depoimento
     */ 
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * Set the value of depoimento
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }


       /**
     * Get the value of depoimento
     */ 
    public function getImage():string
    {
        return $this->image;
    }

    /**
     * Set the value of depoimento
     *
     * @return  self
     */ 
    public function setImage(string $image):self
    {
        $this->image = $image;

        return $this;
    }


}