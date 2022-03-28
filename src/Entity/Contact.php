<?php

namespace Template\Entity;

/**
 * 
 * @Entity
 * @Table(name="contact")
 * 
 */

class Contact {


    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;


    /**
     * @Column(type="string", length=800)
     */
    private $name;



    /**
     * 
     * @Column(type="string", length=100)
     */
    private $tel;


    /**
     * @Column(type="string", length=200)
     */
    private $email;


    
    /**
     * 
     * @Column(type="string", length=4000)
     */
    private $msg;






    



    




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
     * Get the value of name
     */ 
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel():string
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel(string $tel):self
    {
        $this->tel = $tel;

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

    /**
     * Get the value of msg
     */ 
    public function getMsg():string
    {
        return $this->msg;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */ 
    public function setMsg(string $msg):self
    {
        $this->msg = $msg;

        return $this;
    }
}