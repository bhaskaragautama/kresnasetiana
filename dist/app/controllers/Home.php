<?php
class Home extends Controller
{
   public function index()
   {
      $data['series'] = $this->model('Series_model')->readAll();
      $data['collection'] = $this->model('Collection_model')->readAll();
      $data['best'] = $this->model('Best_model')->readAll();
      $nav['series'] = $this->model('Series_model')->readAll();
      $nav['collection'] = $this->model('Collection_model')->readAll();
      $this->view('user/template/header', 'home', $nav);
      $this->view('user/home/home', '', $data);
      $this->view('user/template/footer');
   }

   public function story($id)
   {
      $id = $this->sanitizeInt($id);
      $data['series'] = $this->model('Series_model')->readById($id);
      $data['stories'] = $this->model('Story_model')->readByCategory($id);
      foreach ($data['stories'] as $key => $value) {
         $data['stories'][$key]['thumbnail'] = $this->model('Story_pict_model')->readThumb($value['id']);
      }
      $nav['series'] = $this->model('Series_model')->readAll();
      $nav['collection'] = $this->model('Collection_model')->readAll();
      $this->view('user/template/header', 'story', $nav);
      $this->view('user/story/story', '', $data);
      $this->view('user/template/footer');
   }

   public function storyDetail($id)
   {
      $id = $this->sanitizeInt($id);
      $data['story'] = $this->model('Story_model')->readById($id);
      $data['images'] = $this->model('Story_pict_model')->readByStory($id);
      $nav['series'] = $this->model('Series_model')->readAll();
      $nav['collection'] = $this->model('Collection_model')->readAll();
      $this->view('user/template/header', 'story', $nav);
      $this->view('user/story/detail', '', $data);
      $this->view('user/template/footer');
   }

   public function portfolio()
   {
      $data['tag'] = $this->model('Tag_model')->readAll();
      $data['images'] = $this->model('Photo_model')->readAll();
      $nav['series'] = $this->model('Series_model')->readAll();
      $nav['collection'] = $this->model('Collection_model')->readAll();
      $this->view('user/template/header', 'story', $nav);
      $this->view('user/portfolio/portfolio', '', $data);
      $this->view('user/template/footer');
   }
}
