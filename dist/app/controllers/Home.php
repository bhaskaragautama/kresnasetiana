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

   public function story($id)
   {
      $id = $this->sanitizeInt($id);
      $data = $this->model('Story_model')->readByCategory($id);
      foreach ($data as $key => $value) {
         $data[$key]['thumbnail'] = $this->model('Story_pict_model')->readThumb($value['id']);
      }
      $nav['series'] = $this->model('Series_model')->readAll();
      $nav['collection'] = $this->model('Collection_model')->readAll();
      $this->view('user/template/header', 'story', $nav);
      $this->view('user/story/story', '', $data);
      $this->view('user/template/footer');
   }
}
