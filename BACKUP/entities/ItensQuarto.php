<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="itens_quarto")
 * 
 */

class ItensQuarto {


    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;


    /**
     * @Column(type="string", length="180")
     */
    private $name;



    /**
     * 
     * @Column(type="string", length="2400")
     */
    private $description;


    /**
     * 
     * @ManyToOne(targetEntity="Acomodacao")
     * 
     */
    private $acomodacao; 



    




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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of acomodacao
     */ 
    public function getAcomodacao()
    {
        return $this->acomodacao;
    }

    /**
     * Set the value of acomodacao
     *
     * @return  self
     */ 
    public function setAcomodacao(Acomodacao $acomodacao)
    {
        $this->acomodacao = $acomodacao;

        return $this;
    }
}