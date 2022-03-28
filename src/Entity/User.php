<?php

namespace Template\Entity;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $user;
     /**
     * @Column(type="string", length=500)
     * 
     */
    private $password;

    public function verify_password(string $pass): bool
    {
        echo "pass:";   var_dump($pass);
        echo "password:";   var_dump($this->password);
        $verificar = password_verify($this->password, $pass);
        var_dump($verificar);
        return password_verify($this->password, $pass);
    }

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
     * Get the value of user
     */ 
    public function getUser():string
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser(string $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }
}
