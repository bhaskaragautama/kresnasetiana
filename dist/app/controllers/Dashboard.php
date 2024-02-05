<?php
class Dashboard extends Controller
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
        $this->view('admin/templates/header', 'dashboard');
        $this->view('admin/dashboard/dashboard');
        $this->view('admin/templates/footer');
    }

    public function getAllSummary() {
        echo json_encode($this->model('Flow_model')->readByTerm());
    }
}
