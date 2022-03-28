<?php

namespace Template\Entity;



/**
 * 
 * @Entity
 * @Table(name="maravilhas")
 * 
 */
class Maravilhas {

    
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
     * @Column(type="string", length=180)
     * 
     */
    private $section;


        /**
     * 
     * @Column(type="string", length=9000)
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
     * Get the value of section
     */ 
    public function getSection():string
    {
        return $this->section;
    }

    /**
     * Set the value of section
     *
     * @return  self
     */ 
    public function setSection(string $section):self
    {
        $this->section = $section;

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
}