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

    public function getDetail($id)
    {
        $id = $this->sanitizeInt($id);
        $data['detail'] = $this->model('Story_model')->readById($this->sanitizeInt($id));
        $data['images'] = $this->model('Story_pict_model')->readByStory($id);
        echo json_encode($data);
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
        // print_r($_FILES);
        // echo '</pre>';
        // foreach ($_POST['desc'] as $key => $value) {
        //     $desc = $this->sanitizeString($value);
        //     $position = ($_POST['position'][$key] == '' ? NULL : $this->sanitizeInt($_POST['position'][$key]));
        //     echo 'Position : ' . $position . '<br>';
        // }
        // die;
        if (!empty($_FILES['photo']['name'][0])) {
            $images = new Image($_FILES['photo']);
            if ($images->checkValidity()) {
                $uploadedFile = $images->updloadResize();
            }
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
            $this->model('Story_pict_model')->resetBest($id);
            $this->model('Story_pict_model')->resetThumb($id);
            foreach ($_POST['desc'] as $key => $value) {
                $desc = $this->sanitizeString($value);
                $position = ($_POST['position'][$key] == '' || $desc == '' ? NULL : $this->sanitizeInt($_POST['position'][$key]));
                $this->model('Story_pict_model')->update(['desc' => $desc, 'desc_position' => $position], $key);
            }
            foreach ($_POST['best'] as $key => $value) {
                $this->model('Story_pict_model')->update(['is_best' => 1], $key);
            }
            foreach ($_POST['thumb'] as $key => $value) {
                $this->model('Story_pict_model')->update(['is_thumb' => 1], $key);
            }
        }
        if (!empty($_FILES['photo']['name'][0])) {
            foreach ($_FILES['photo']['name'] as $key => $value) {
                $photo = [
                    'story_id' => ($id == '' ? $save : $id),
                    'picture' => $uploadedFile[$key]['name'],
                    'orientation' => $uploadedFile[$key]['orientation']
                ];
                $this->model('Story_pict_model')->create($photo);
            }
        }
        if ($save) {
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'story' . (!empty($_FILES['photo']['name'][0]) ? '/form/' . ($id == '' ? $save : $id) : ''));
    }

    public function deletePhoto($photoId, $storyId)
    {
        $photoId = $this->sanitizeInt($photoId);
        $storyId = $this->sanitizeInt($storyId);
        $photo = $this->model('Story_pict_model')->readById($photoId);
        unlink(IMGDIR . $photo['picture']);
        unlink(THUMBDIR . $photo['picture']);
        $delete = $this->model('Story_pict_model')->delete($photoId);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'story/form/' . $storyId);
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        // unlink pict
        $picts = $this->model('Story_pict_model')->readByStory($id);
        foreach ($picts as $key => $value) {
            unlink(IMGDIR . $value['picture']);
            unlink(THUMBDIR . $value['picture']);
        }
        // delete stories_pict
        $this->model('Story_pict_model')->deleteByStory($id);
        $delete = $this->model('Story_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'story');
    }
}
