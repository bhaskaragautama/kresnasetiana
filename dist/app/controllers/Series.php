<?php
class Series extends Controller
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
        $this->view('admin/templates/header', 'series');
        $this->view('admin/series/series', '', $this->model('Series_model')->readAll());
        $this->view('admin/templates/footer');
    }

    public function form($id = '')
    {
        $data = ($id == '' ? '' : $this->model('Series_model')->readById($this->sanitizeInt($id)));
        $this->view('admin/templates/header', 'series');
        $this->view('admin/series/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $category = $this->sanitizeString($_POST['category']);
        $data = ["category" => $category];
        if ($id == "") {
            $save = $this->model("Series_model")->create($data);
        } else {
            $save = $this->model("Series_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'series');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        $check = $this->model('Story_model')->checkSeries($id);
        if($check > 0) {
            Flasher::setFlash('This series is used by story data', 'danger');
            header('Location: ' . BASEURL . 'series');
            die;
        }
        $delete = $this->model('Series_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'series');
    }
}
