<?php

namespace Template\Entity;


/**
 * 
 * @Entity
 * @Table(name="topic")
 * 
 */

class Topic {


    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
        private $id;

        /**@Column(type="string") */
        private $title;



        /**@Column(type="string") */
        private $type;


        /** @Column(type="string")*/
        private $image;


        /** @Column(type="string")*/
        private $description;


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
         * Get the value of topic
         */ 
        public function getType():string
        {
                return $this->type_topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setType(string $type):self
        {
                $this->type = $type;

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

        /**
         * Get the value of description
         */ 
        public function getDescription():string
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription(string $description):self
        {
                $this->description = $description;

                return $this;
        }

}

