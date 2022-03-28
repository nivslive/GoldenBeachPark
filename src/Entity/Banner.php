<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="banner")
 * 
 */
class Banner {

     /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(type="string", length=200)
     */
    private $page;
    
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
    public function getPage():string
    {
        return $this->page;
    }

    /**
     * Set the value of depoimento
     *
     * @return  self
     */ 
    public function setPage(string $page):self
    {
        $this->page = $page;

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