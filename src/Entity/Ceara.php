<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="passeio_ceara")
 * 
 */
 class Ceara  {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * 
     * @ManyToOne(targetEntity="Passeio")
     * 
     */
    private $passeio;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of passeio
     */ 
    public function getPasseio()
    {
        return $this->passeio;
    }

    /**
     * Set the value of passeio
     *
     * @return  self
     */ 
    public function setPasseio($passeio)
    {
        $this->passeio = $passeio;

        return $this;
    }
 }