<?php
class Slideshow_model extends Model
{
    protected $table = 'carousel';

    // override
    public function readAll()
    {
        $this->db->query("SELECT * FROM `$this->table` ORDER BY `id` ASC");
        return $this->db->results();
    }

    public function readByOrientation($orientation)
    {
        $this->db->query("SELECT * FROM `$this->table` WHERE `type`=:orientation ORDER BY `id` ASC");
        $this->db->bind('orientation', $orientation);
        return $this->db->results();
    }
}
