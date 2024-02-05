<?php
    class User extends Controller {

        public function __construct() {
            if(!$_SESSION['delusi-auth'] || $_SESSION['delusi-role'] != 1) {
               Flasher::setFlash('Anda tidak diizinkan untuk mengakses halaman tersebut','','','danger');
               header('Location: '.BASEURL);
               die;
            }
        }

        public function index() {
            $data = $this->model('User_model')->readAll($_SESSION['delusi-username']);
            $this->view('templates/header', 'user');
            $this->view('user/user', '', $data);
            $this->view('templates/footer');
        } 

        public function save() {
            // print_r($_POST); die;
            $exist = $this->model('User_model')->readById($_POST['username']);
            if($exist) {
                Flasher::setFlash('Username sudah ada', '', '', 'danger');
            } else if($_POST['password'] != $_POST['confirm']) {
                Flasher::setFlash('Username dan password tidak cocok', '', '', 'danger');
            } else {
                $this->model('User_model')->create($_POST);
                $this->model('Activity_log_model')->create(['username' => $_SESSION['delusi-username'], 'action' => 'Menambah pengguna', 'detail' => implode(' | ', $_POST)]);
                Flasher::setFlash('User berhasil ditambahkan', '', '', 'success');
            }
            header('Location: '.BASEURL.'user');
        }

        public function delete($id) {
            $data = $this->model('User_model')->readById($id);
            if($this->model('User_model')->delete($id)) {
                $this->model('Activity_log_model')->create(['username' => $_SESSION['delusi-username'], 'action' => 'Menghapus pengguna', 'detail' => implode(' | ', $data)]);
                Flasher::setFlash('Data berhasil dihapus', '', '', 'success');
                header('Location: '.BASEURL.'user');
            }
        }

        public function checkUsername($username) {
            $exist = $this->model('User_model')->readById($username);
            if($exist) {
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

        public function saveRole() {
            $data = $this->model('User_model')->readById($_POST['username']);
            $this->model('User_model')->updateRole($_POST);
            $this->model('Activity_log_model')->create(['username' => $_SESSION['delusi-username'], 'action' => 'Mengubah peran pengguna', 'detail' => 'Dari<br>'.implode(' | ', $data).'<br>menjadi<br>'.implode(' | ', $_POST)]);
            header('Location: '.BASEURL.'user');
        }

        public function savePassword() {
            $data = $this->model('User_model')->readById($_POST['username']);
            if($_POST['password'] != $_POST['confirm']) {
                Flasher::setFlash('Username dan password tidak cocok', '', '', 'danger');
            } else {
                $this->model('User_model')->updatePassword($_POST);
                $this->model('Activity_log_model')->create(['username' => $_SESSION['delusi-username'], 'action' => 'Mengubah password pengguna', 'detail' => 'Dari<br>'.implode(' | ', $data).'<br>menjadi<br>'.implode(' | ', $_POST)]);
                Flasher::setFlash('Password berhasil diubah', '', '', 'success');
            }
            header('Location: '.BASEURL.'user');
        }

        public function edit($id) {
            $data = $this->model('User_model')->readById($id);
            echo json_encode($data);
        }

    }
?>