<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="sections")
 * 
 */


class Section {



    /**
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     * 
     */
    private $id;

    /**
     *  @Column(type="string", length=200)
     * 
     */
    private $title;

    /**
     *  @Column(type="string", length=2500, nullable=true)
     * 
     */
    private $description;



    /**
     *  @Column(type="string", length=200)
     * 
     */
    private $section;

        /**
     *  @Column(type="string", nullable=true)
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
     * Get the value of subtitle
     */ 
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setDescription(string $description):self
    {
        $this->description = $description;

        return $this;
    }



    






    /**
     * Get the value of image
     */ 
    public function getImage():?string
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
     * Get the value of section
     */ 
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set the value of section
     *
     * @return  self
     */ 
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }
}