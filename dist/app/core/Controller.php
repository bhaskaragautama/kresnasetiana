<?php
class Controller
{
   public function view($view, $page = '', $data = [])
   {
      require_once '../app/views/' . $view . '.php';
   }

   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      return new $model;
   }

   public function sanitizeString($var)
   {
      return strip_tags(trim($var));
   }

   public function sanitizeInt($var)
   {
      return filter_var(trim($var), FILTER_SANITIZE_NUMBER_INT);
   }

   public function sanitizeEmail($var)
   {
      return filter_var(trim($var), FILTER_SANITIZE_EMAIL);
   }

   public function sanitizeUrl($var)
   {
      return filter_var(trim($var), FILTER_SANITIZE_URL);
   }

   //redirects
   public function lost()
   {
      require_once '../app/views/general/lost.php';
   }
}
