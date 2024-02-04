<?php
class Dashboard extends Controller
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
        $data['term'] = $this->model("Term_model")->readActive();
        $data['currin'] = $this->model("Flow_model")->readCurrentIn();
        $data['currout'] = $this->model("Flow_model")->readCurrentOut();
        $data['allin'] = $this->model("Flow_model")->readAllIn();
        $data['allout'] = $this->model("Flow_model")->readAllOut();
        $data['allsummary'] = $this->model('Flow_model')->readByTerm();
        $this->view('templates/header', 'dashboard');
        $this->view('dashboard/dashboard', '', $data);
        $this->view('templates/footer');
    }

    public function getAllSummary() {
        echo json_encode($this->model('Flow_model')->readByTerm());
    }
}
