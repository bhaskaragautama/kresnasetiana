<?php
class Home extends Controller
{
   public function index()
   {
      $data['series'] = $this->model('Series_model')->readAll();
      $data['collection'] = $this->model('Collection_model')->readAll();
      $data['best'] = $this->model('Best_model')->readAll();
      $this->view('user/home/home', '', $data);
   }
}
