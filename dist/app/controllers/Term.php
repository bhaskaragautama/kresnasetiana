<?php
class Term extends Controller
{

    public function __construct()
    {
        if (!$_SESSION['flow-auth']) {
            Flasher::setFlash('Access forbidden', 'danger');
            header('Location: ' . BASEURL);
            die;
        }
    }

    public function index()
    {
        $data = $this->model("Term_model")->readAll();
        $this->view('templates/header', 'term');
        $this->view('term/term', '', $data);
        $this->view('templates/footer');
    }

    public function form($id = "")
    {
        $this->view('templates/header', 'term');
        if ($id == "") {
            $this->view('term/form');
        } else {
            $id = $this->sanitizeInt($id);
            $data = $this->model("Term_model")->readById($id);
            $this->view('term/form', '', $data);
        }
        $this->view('templates/footer');
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $name = $this->sanitizeString($_POST['name']);
        if (isset($_POST['is-active'])) {
            $isActive = $this->sanitizeInt($_POST['is-active']);
            $this->model("Term_model")->updateInactive();
        } else {
            $isActive = 0;
        }
        $data = [
            "term_name" => $name,
            "is_active" => $isActive
        ];
        if ($id == "") {
            $save = $this->model("Term_model")->create($data);
        } else {
            $save = $this->model("Term_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'term');
    }

    public function setActive($id)
    {
        $id = $this->sanitizeInt($id);
        if ($id) {
            $this->model("Term_model")->updateInactive();
            $this->model("Term_model")->updateActive($id);
        }
        header('Location: ' . BASEURL . 'term');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        if ($id) {
            $this->model("Term_model")->delete($id);
        }
        header('Location: ' . BASEURL . 'term');
    }
}
