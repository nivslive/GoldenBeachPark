<?php

class Component {


      private static  $params = [];



        public function __construct(){
              new Component;
        }



        public static function render(string $component, string $page = '', array $params = []) {
                  $root = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'GoldenBeachHotel'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'site';


                  if(!$params = []) {

                    $test = array('test' => 'testando');

                    self::setParams($params);
              }

                if($page == '') {
                  require  $root.DIRECTORY_SEPARATOR.'components'
                                      .DIRECTORY_SEPARATOR.ucfirst($component).'.php';
                }

                else {           
                require  $root.DIRECTORY_SEPARATOR.'components'
                                      .DIRECTORY_SEPARATOR.$page
                                      .DIRECTORY_SEPARATOR.ucfirst($component).'.php';
                                      }
                                    } 



                            public static function params() {
                            return self::getParams();
                            }
                    
                            public static function getParams():array {
                              return self::$params;
                            }
                    
                            public static function setParams(array $params)
                            { 
                              self::$params = $params;
                              return self::$params;
                    
                            }
                    


                }




              ?>