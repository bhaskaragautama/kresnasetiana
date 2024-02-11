<?php
class Photo extends Controller
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
        $this->view('admin/templates/header', 'photo');
        $this->view('admin/photo/photo', '', $this->model('Photo_model')->readAll());
        $this->view('admin/templates/footer');
    }

    public function form($id = '')
    {
        if ($id != '') {
            $data['form'] = $this->model('Photo_model')->readById($this->sanitizeInt($id));
            $data['pivot'] = $this->model('Photo_tag_model')->readByPhoto($this->sanitizeInt($id));
        }
        $data['tag'] = $this->model('Tag_model')->readNameOrder();
        $this->view('admin/templates/header', 'photo');
        $this->view('admin/photo/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // echo '</pre>';
        // die;
        $id = $this->sanitizeInt($_POST['id']);
        $title = $this->sanitizeString($_POST['title']);
        $best = (isset($_POST['is-best']) ? 1 : null);

        $data = [
            'title' => $title,
            'is_best' => $best,
        ];

        if(!empty($_FILES['photo']['name'][0])) {
            $images = new Image($_FILES['photo']);
            if ($images->checkValidity()) {
                $uploadedFile = $images->updloadResize();
            }
            $photo = $uploadedFile[0]['name'];
            $orientation = $uploadedFile[0]['orientation'];
            $data['picture'] = $photo;
            $data['orientation'] = $orientation;
            // delete old photo
            if($id != '') {
                $oldPhoto = $this->model('Photo_model')->readById($id);
                unlink(IMGDIR.$oldPhoto['picture']);
                unlink(THUMBDIR.$oldPhoto['picture']);
            }
        }

        if ($id == "") {
            $save = $this->model("Photo_model")->create($data);
        } else {
            $save = $this->model("Photo_model")->update($data, $id);
            $this->model('Photo_tag_model')->deleteByPhoto($id);
        }
        if ($save) {
            $photoId = ($id == '' ? $save : $id);
            foreach ($_POST['tag'] as $key => $value) {
                $value = $this->sanitizeInt($value);
                $this->model('Photo_tag_model')->create(['port_id' => $photoId, 'tag_id' => $value]);
            }
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'photo');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        $this->model('Photo_tag_model')->deleteByPhoto($id);
        $photo = $this->model('Photo_model')->readById($id);
        unlink(IMGDIR.$photo['picture']);
        unlink(THUMBDIR.$photo['picture']);
        $delete = $this->model('Photo_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'photo');
    }
}
