<?php 
    class Template{
       //Path To Template 
       protected $template;
       //Vars passed in
       protected $vars = array();

       //constructor
       public function __construct($template){
            $this->template = $template;
       }

       public function __get($key){
           return $this->vars[$key];
       }

       public function __set($key, $value){
            $this->vars[$key] = $value;
       }

       public function __toString(){
           extract($this->vars); // This allows inside a template  call $name, instead of $template->name
           chdir(dirname($this->template)); //Define a path name
           ob_start(); // Turn on output buffering

           include basename($this->template); // Cut off all path, leaves only file name 

           return ob_get_clean(); // Get current buffer contents and delete current output buffer

       }

       public function hello()
       {
           var_dump('Template');
       }
    }