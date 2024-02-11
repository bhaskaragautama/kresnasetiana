<?php
class Collection extends Controller
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
        $data = $this->model('Collection_model')->readAll();
        $this->view('admin/templates/header', 'collection');
        $this->view('admin/collection/collection', '', $data);
        $this->view('admin/templates/footer');
    }

    public function form($id = '')
    {
        $data = ($id == '' ? '' : $this->model('Collection_model')->readById($this->sanitizeInt($id)));
        $this->view('admin/templates/header', 'collection');
        $this->view('admin/collection/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $category = $this->sanitizeString($_POST['category']);
        $data = ["category" => $category];
        if ($id == "") {
            $save = $this->model("Collection_model")->create($data);
        } else {
            $save = $this->model("Collection_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'collection');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        $check = $this->model('Item_model')->checkCollection($id);
        if ($check > 0) {
            Flasher::setFlash('This collection is used by item data', 'danger');
            header('Location: ' . BASEURL . 'collection');
            die;
        }
        $delete = $this->model('Collection_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'collection');
    }
}
