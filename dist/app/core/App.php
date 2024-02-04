<?php
   class App {
      protected $controller = 'Home';
      protected $method = 'index';
      protected $params = [];
      protected $usedController;

      public function __construct() {
         $url = $this->parseURL();

         //check controller
         if(isset($url[0])) {
            if(file_exists('../app/controllers/'.ucfirst($url[0]).'.php')){
               $this->controller = ucfirst($url[0]);
            } else {
               $this->method = 'lost';
            }
            unset($url[0]);
         }

         //use controller
         $this->useController($this->controller);

         //check method
         if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
               $this->method = $url[1];
            } else {
               $this->method = 'lost';
            }
            unset($url[1]);
         }

         if(!empty($url)){
            $this->params = array_values($url);
         }
        // echo $this->method; die;
         call_user_func_array([$this->usedController, $this->method], $this->params);
      }

      public function parseURL() {
         if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
         }
      }

      public function useController($use) {
         require_once '../app/controllers/'.$use.'.php';
         $this->usedController = new $use;
      }
   }
?>