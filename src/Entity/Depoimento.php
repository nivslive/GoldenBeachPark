<?php

namespace Template\Entity;



/**
 * 
 * @Entity
 * @Table(name="depoimento")
 * 
 */
class Depoimento {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * 
     * @Column(type="string", length=180)
     * 
     */
    private $name;


        /**
     * 
     * @Column(type="string", length=9000)
     * 
     */
    private $depoimento;



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
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }


 

    /**
     * Get the value of depoimento
     */ 
    public function getDepoimento():string
    {
        return $this->depoimento;
    }

    /**
     * Set the value of depoimento
     *
     * @return  self
     */ 
    public function setDepoimento(string $depoimento):self
    {
        $this->depoimento = $depoimento;

        return $this;
    }
}