<?php
class Best extends Controller
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
        $this->view('admin/templates/header', 'best');
        $this->view('admin/best/best', '', $this->model('Best_model')->readAll());
        $this->view('admin/templates/footer');
    }

    public function exclude($table, $id)
    {
        $table = $this->sanitizeString($table);
        $id = $this->sanitizeInt($id);
        $update = $this->model('Best_model')->updateBest($table, $id);
        if ($update) {
            Flasher::setFlash('The photo is successfully excluded', 'success');
        } else {
            Flasher::setFlash('Failed to exclude the photo', 'danger');
        }
        header('Location: ' . BASEURL . 'best');
    }
}
