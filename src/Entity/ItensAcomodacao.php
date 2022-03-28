<?php

namespace Template\Entity;


/**
 * 
 * @Entity
 * @Table(name="itens_acomodacao")
 * 
 */

class ItensAcomodacao {


    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;


    /**
     * @Column(type="string")
     */
    private $name;



    /**
     * 
     * @Column(type="string")
     */
    private $description;


    /**
     * 
     * @Column(type="string")
     */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="Acomodacao", inversedBy="itens")
     * @ORM\JoinColumn(name="acomodacao_id", referencedColumnName="acomodacao_id", nullable=true)
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
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }





    /**
     * Get the value of acomodacao
     */ 
    public function getAcomodacao():Acomodacao
    {
        return $this->acomodacao;
    }

    /**
     * Set the value of acomodacao
     *
     * @return  self
     */ 
    public function setAcomodacao(Acomodacao $acomodacao):self
    {
        $this->acomodacao = $acomodacao;

        return $this;
    }


}