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
        $data = [
            "id_term" => $term,
            "type" => $type,
            "amount" => $amount,
            "justification" => $just,
            "date" => $date
        ];
        if ($id == "") {
            $save = $this->model("Flow_model")->create($data);
        } else {
            $save = $this->model("Flow_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'flow');
    }
}
