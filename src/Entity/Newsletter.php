<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="newsletter")
 * 
 */

class Newsletter {


    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;


    /**
     * @Column(type="string", length=400)
     */
    private $email;






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
     * Get the value of email
     */ 
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email):self
    {
        $this->email = $email;

        return $this;
    }
}