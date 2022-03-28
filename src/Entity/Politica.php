<?php

namespace Template\Entity;



/**
 * 
 * @Entity
 * @Table(name="politica")
 * 
 */
class Politica {

    
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
    private $title;


        /**
     * 
     * @Column(type="string", length=9000)
     * 
     */
    private $politicas;



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
     * Get the value of politicas
     */ 
    public function getPoliticas():string
    {
        return $this->politicas;
    }

    /**
     * Set the value of politicas
     *
     * @return  self
     */ 
    public function setPoliticas(string $politicas):self
    {
        $this->politicas = $politicas;

        return $this;
    }

 
}