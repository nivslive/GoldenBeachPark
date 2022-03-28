<?php

namespace Template\Entity;

use DateTime;

/**
 * 
 * @Entity
 * @Table(name="reservas")
 * 
 */
class Reservas {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /** @Column(type="datetime") */
    private $inicio_data;
    /** @Column(type="datetime") */
    private $fim_data;
     /** @Column(type="integer") */
    private $noites;
     /** @Column(type="integer") */
    private $apartamentos;
     /** @Column(type="integer") */
    private $adultos;
     /** @Column(type="integer") */
    private $criancas;




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
     * Get the value of inicio_data
     */ 
    public function getInicio_data():DateTime
    {
        return $this->inicio_data;
    }

    /**
     * Set the value of inicio_data
     *
     * @return  self
     */ 
    public function setInicio_data(DateTime $inicio_data):self
    {
        $this->inicio_data = $inicio_data;

        return $this;
    }


     /**
     * Get the value of fim_data
     */ 
    public function getFim_data():DateTime
    {
        return $this->fim_data;
    }

    /**
     * Set the value of fim_data
     *
     * @return  self
     */ 
    public function setFim_data($fim_data)
    {
        $this->fim_data = $fim_data;

        return $this;
    }


    /**
     * Get the value of noites
     */ 
    public function getNoites():int
    {
        return $this->noites;
    }

    /**
     * Set the value of noites
     *
     * @return  self
     */ 
    public function setNoites(int $noites):self
    {
        $this->noites = $noites;

        return $this;
    }
    

    /**
     * Get the value of apartamentos
     */ 
    public function getApartamentos():int
    {
        return $this->apartamentos;
    }

    /**
     * Set the value of apartamentos
     *
     * @return  self
     */ 
    public function setApartamentos(int $apartamentos):self
    {
        $this->apartamentos = $apartamentos;

        return $this;
    }

    /**
     * Get the value of adultos
     */ 
    public function getAdultos():int
    {
        return $this->adultos;
    }

    /**
     * Set the value of adultos
     *
     * @return  self
     */ 
    public function setAdultos(int $adultos): self
    {
        $this->adultos = $adultos;

        return $this;
    }

    

    /**
     * Get the value of criancas
     */ 
    public function getCriancas(): int
    {
        return $this->criancas;
    }

    /**
     * Set the value of criancas
     *
     * @return  self
     */ 
    public function setCriancas(int $criancas): self
    {
        $this->criancas = $criancas;

        return $this;
    }




   




}