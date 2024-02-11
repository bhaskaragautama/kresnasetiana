<?php
class Stories extends Controller
{
    public function __construct($id)
    {
        $id = $this->sanitizeInt($id);
        $data = $this->model('Story_model')->readByCategory($id);
        $this->view('user/story/story', '', $data);
    }
}
