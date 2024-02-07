<?php
class Story extends Controller
{

    public function __construct()
    {
        if (!$_SESSION['kkAuth']) {
            Flasher::setFlash('Access forbidden', 'danger');
            header('Location: ' . BASEURL);
            die;
        }
    }

    public function index()
    {
        $this->view('admin/templates/header', 'story');
        $this->view('admin/story/story', '', $this->model('Story_model')->readAll());
        $this->view('admin/templates/footer');
    }

    public function form($id = '')
    {
        $id = $this->sanitizeInt($id);
        $data['series'] = $this->model('Series_model')->readAll();
        if ($id != '') {
            $data['form'] = $this->model('Story_model')->readById($this->sanitizeInt($id));
            $data['images'] = $this->model('Story_pict_model')->readByStory($id);
        }
        $this->view('admin/templates/header', 'story');
        $this->view('admin/story/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die;
        $images = new Image($_FILES['photo']);
        if ($images->checkValidity()) {
            $uploadedFile = $images->updloadResize();
        }
        $id = $this->sanitizeInt($_POST['id']);
        $series = $this->sanitizeInt($_POST['series']);
        $title = $this->sanitizeString($_POST['title']);
        $data = [
            "cat_id" => $series,
            "title" => $title,
        ];
        if ($id == "") {
            $save = $this->model("Story_model")->create($data);
        } else {
            $save = $this->model("Story_model")->update($data, $id);
        }
        if ($save) {
            foreach ($_FILES['photo']['name'] as $key => $value) {
                $photo = [
                    'story_id' => $save,
                    'picture' => $uploadedFile[$key]['name'],
                    'orientation' => $uploadedFile[$key]['orientation']
                ];
                $this->model('Story_pict_model')->create($photo);
            }
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'story/form/' . $save);
    }
}
