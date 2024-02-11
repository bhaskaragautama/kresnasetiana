<?php
class Item extends Controller
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
        $data = $this->model('Item_model')->readAll();
        $this->view('admin/templates/header', 'item');
        $this->view('admin/item/item', '', $data);
        $this->view('admin/templates/footer');
    }

    public function getDetail($id)
    {
        $id = $this->sanitizeInt($id);
        $data['detail'] = $this->model('Item_model')->readById($this->sanitizeInt($id));
        $data['images'] = $this->model('Item_pict_model')->readByItem($id);
        echo json_encode($data);
    }

    public function form($id = '')
    {
        if ($id != '') {
            $data['form'] = $this->model('Item_model')->readById($this->sanitizeInt($id));
        }
        $data['collection'] = $this->model('Collection_model')->readAll();
        $this->view('admin/templates/header', 'item');
        $this->view('admin/item/form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function photo($id, $photo = '')
    {
        $id = $this->sanitizeInt($id);
        $data['item'] = $this->model('Item_model')->readById($id);
        $data['picts'] = $this->model('Item_pict_model')->readByItem($id);
        if ($photo != '') {
            $data['photo'] = $this->model('Item_pict_model')->readById($this->sanitizeInt($photo));
        }
        $this->view('admin/templates/header', 'item');
        $this->view('admin/item/photo-form', '', $data);
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        $id = $this->sanitizeInt($_POST['id']);
        $collection = $this->sanitizeInt($_POST['collection']);
        $title = $this->sanitizeString($_POST['title']);
        $description = $this->sanitizeString($_POST['description']);
        $data = [
            'cat_id' => $collection,
            'title' => $title,
            'description' => $description
        ];
        if ($id == '') {
            $save = $this->model('Item_model')->create($data);
        } else {
            $save = $this->model('Item_model')->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash('Data is successfully been saved', 'success');
        } else {
            Flasher::setFlash('Failed to save data', 'danger');
        }
        header('Location: ' . BASEURL . 'item');
    }

    public function savePhoto()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // echo '</pre>';
        // die;
        $id = $this->sanitizeInt($_POST['id']);
        $item = $this->sanitizeInt($_POST['item']);
        $title = $this->sanitizeString($_POST['title']);
        $idr = $this->sanitizeInt($_POST['idr']);
        $best = (isset($_POST['is-best']) ? 1 : null);

        $data = [
            'store_id' => $item,
            'title' => $title,
            'idr' => $idr,
            'is_best' => $best,
        ];

        if (!empty($_FILES['photo']['name'][0])) {
            $images = new Image($_FILES['photo']);
            if ($images->checkValidity()) {
                $uploadedFile = $images->updloadResize();
            }
            $photo = $uploadedFile[0]['name'];
            $orientation = $uploadedFile[0]['orientation'];
            $data['picture'] = $photo;
            $data['orientation'] = $orientation;
            // delete old photo
            if ($id != '') {
                $oldPhoto = $this->model('Photo_model')->readById($id);
                unlink(IMGDIR . $oldPhoto['picture']);
                unlink(THUMBDIR . $oldPhoto['picture']);
            }
        }

        if ($id == "") {
            $save = $this->model("Item_pict_model")->create($data);
        } else {
            $save = $this->model("Item_pict_model")->update($data, $id);
        }
        if ($save) {
            Flasher::setFlash("Data is successfully been saved", "success");
        } else {
            Flasher::setFlash("Failed to save data", "danger");
        }
        header('Location: ' . BASEURL . 'item/photo/' . $item);
    }

    public function deletePhoto($photoId, $itemId)
    {
        $photoId = $this->sanitizeInt($photoId);
        $itemId = $this->sanitizeInt($itemId);
        $photo = $this->model('Item_pict_model')->readById($photoId);
        unlink(IMGDIR . $photo['picture']);
        unlink(THUMBDIR . $photo['picture']);
        $delete = $this->model('Item_pict_model')->delete($photoId);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'item/photo/' . $itemId);
    }

    public function delete($id)
    {
        $id = $this->sanitizeInt($id);
        $picts = $this->model('Item_pict_model')->readByItem($id);
        foreach ($picts as $key => $value) {
            unlink(IMGDIR . $value['picture']);
            unlink(THUMBDIR . $value['picture']);
        }
        $this->model('Item_pict_model')->deleteByItem($id);
        $delete = $this->model('Item_model')->delete($id);
        if ($delete) {
            Flasher::setFlash('Data is successfully been deleted', 'success');
        } else {
            Flasher::setFlash('Failed to delete data', 'danger');
        }
        header('Location: ' . BASEURL . 'item');
    }
}
