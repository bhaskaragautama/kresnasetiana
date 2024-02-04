<?php
class Flow extends Controller
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
        $data['data'] = $this->model("Flow_model")->readAll();
        $data['currin'] = $this->model("Flow_model")->readCurrentIn();
        $data['currout'] = $this->model("Flow_model")->readCurrentOut();
        $data['term'] = $this->model("Term_model")->readActive();
        $this->view('templates/header', 'flow');
        $this->view('flow/flow', '', $data);
        $this->view('templates/footer');
    }

    public function form($id = "")
    {
        $term = $this->model("Term_model")->readAll();
        $this->view('templates/header', 'flow');
        if ($id == "") {
            $this->view('flow/form', '', ["term" => $term]);
        } else {
            $id = $this->sanitizeInt($id);
            $data = $this->model("Flow_model")->readById($id);
            $this->view('flow/form', '', ["term" => $term, "data" => $data]);
        }
        $this->view('templates/footer');
    }

    public function getDetail($id)
    {
        $id = $this->sanitizeInt($id);
        echo json_encode($this->model('Flow_model')->readById($id));
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $term = $this->sanitizeInt($_POST['term']);
        $date = $this->sanitizeString($_POST['date']);
        $type = $this->sanitizeInt($_POST['type']);
        $amount = $this->sanitizeInt($_POST['amount']);
        $just = $this->sanitizeString($_POST['just']);
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

    public function saveSplit() {
        print_r($_POST);
        $id = $this->sanitizeInt($_POST['splitted-id']);
        $date = $this->sanitizeString($_POST['date']);
        $amount = $this->sanitizeInt($_POST['amount']);
        $desc = $this->sanitizeString($_POST['just']);
        $splitted = $this->model('Flow_model')->readById($id);
        $splittedData = [
            "id_term" => $splitted['id_term'],
            "type" => $splitted['type'],
            "amount" => $splitted['amount'] - $amount,
            "justification" => $splitted['justification'],
            "date" => $splitted['date']
        ];
        $updateSplitted = $this->model("Flow_model")->update($splittedData, $id);
        if($updateSplitted) {
            $newData = [
                "id_term" => $splitted['id_term'],
                "type" => $splitted['type'],
                "amount" => $amount,
                "justification" => $desc,
                "date" => $date
            ];
            $save = $this->model("Flow_model")->create($newData);
            if ($save) {
                Flasher::setFlash("Data is successfully splitted", "success");
            } else {
                Flasher::setFlash("Failed to save the new data", "danger");
            }
        } else {
            Flasher::setFlash("Failed to split the flow", "danger");
        }
        header('Location: ' . BASEURL . 'flow');
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        if ($id) {
            $this->model("Flow_model")->delete($id);
        }
        header('Location: ' . BASEURL . 'flow');
    }
}
