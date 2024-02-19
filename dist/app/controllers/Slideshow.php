<?php
class Slideshow extends Controller
{

    public function __construct()
    {
        if (!$_SESSION['kkAuth']) {
            Flasher::setFlash('Access forbidden', 'danger');
            header('Location: ' . BASEURL);
            die;
        }
    }

    public function index($type)
    {
        $type = $this->sanitizeInt($type);
        $data['type'] = $type;
        $data['photo'] = $this->model('Slideshow_model')->readByOrientation($type);
        $this->view('admin/templates/header', ($type == 1 ? 'lslideshow' : 'pslideshow'));
        $this->view('admin/slideshow/slideshow', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        $type = $this->sanitizeInt($_POST['type']);
        $images = new Image($_FILES['photo']);
        if ($images->checkValidity()) {
            $imgDetail = $images->getImages();
            $width = $imgDetail['res'][0][0];
            $height = $imgDetail['res'][0][1];
            if ($type == 0 && $width >= $height) {
                Flasher::setFlash('Please upload a portrait photo', 'danger');
                header('Location: ' . BASEURL . 'slideshow/index/' . $type);
                die;
            }
            if ($type == 1 && $height >= $width) {
                Flasher::setFlash('Please upload a landscape photo', 'danger');
                header('Location: ' . BASEURL . 'slideshow/index/' . $type);
                die;
            }
            $uploadedFile = $images->updloadResize();
            $data = [
                'picture' => $uploadedFile[0]['name'],
                'type' => $type
            ];
            $save = $this->model('Slideshow_model')->create($data);
            if ($save) {
                Flasher::setFlash("Data is successfully been saved", "success");
            } else {
                Flasher::setFlash("Failed to save data", "danger");
            }
        } else {
            Flasher::setFlash("Not an image", "danger");
        }
        header('Location: ' . BASEURL . 'slideshow/index/' . $type);
    }

    public function delete($photoId, $type)
    {
        $photoId = $this->sanitizeInt($photoId);
        $type = $this->sanitizeInt($type);
        $pict = $this->model('Slideshow_model')->readById($photoId);
        unlink(IMGDIR . $pict['picture']);
        unlink(THUMBDIR . $pict['picture']);
        $delete = $this->model('Slideshow_model')->delete($photoId);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'slideshow/index/' . $type);
    }
}
