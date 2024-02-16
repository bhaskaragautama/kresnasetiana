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
        $data['series'] = $this->model('Series_model')->readTotal();
        $data['story'] = $this->model('Story_model')->readTotal();
        $data['collection'] = $this->model('Collection_model')->readTotal();
        $data['item'] = $this->model('Item_model')->readTotal();
        $data['tag'] = $this->model('Tag_model')->readTotal();
        $data['photo'] = $this->model('Photo_model')->readTotal();
        $this->view('admin/templates/header', 'dashboard');
        $this->view('admin/dashboard/dashboard', '', $data);
        $this->view('admin/templates/footer');
    }

    public function getAllSummary()
    {
        echo json_encode($this->model('Flow_model')->readByTerm());
    }
}
