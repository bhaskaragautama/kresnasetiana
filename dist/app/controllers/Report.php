<?php
class Report extends Controller
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
        $data['terms'] = $this->model("Term_model")->readAll();
        $this->view('templates/header', 'report');
        $this->view('report/report', '', $data);
        $this->view('templates/footer');
    }

    public function getReport()
    {
        $term = $this->sanitizeInt($_POST['term']);
        $dateFrom = $this->sanitizeString($_POST['date-from']);
        $dateTo = $this->sanitizeString($_POST['date-to']);
        $data['form'] = ['term' => $term, 'from' => $dateFrom, 'to' => $dateTo];
        $data['terms'] = $this->model("Term_model")->readAll();
        $data['report'] = $this->model("Flow_model")->readReport($term, $dateFrom, $dateTo);
        $this->view('templates/header', 'report');
        $this->view('report/report', '', $data);
        $this->view('templates/footer');
    }
}
