<?php
class Tag extends Controller
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
        $this->view('admin/templates/header', 'tag');
        $this->view('admin/tag/tag', '', $this->model('Tag_model')->readAll());
        $this->view('admin/templates/footer');
    }

    public function form($id = '')
    {
        $data = ($id == '' ? '' : $this->model('Tag_model')->readById($this->sanitizeInt($id)));
        $this->view('admin/templates/header', 'tag');
        $this->view('admin/tag/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $tag = $this->sanitizeString($_POST['tag']);
        $data = ["tag" => $tag];
        if ($id == "") {
            $save = $this->model("Tag_model")->create($data);
        } else {
            $save = $this->model("Tag_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'tag');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        $deletePivot = $this->model('Photo_tag_model')->deleteByTag($id);
        $delete = $this->model('Tag_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'tag');
    }
}
