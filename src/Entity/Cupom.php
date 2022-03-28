<?php

namespace Template\Entity;


class Cupom {

    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    private $title;
    private $description;
    private $cupom;
}