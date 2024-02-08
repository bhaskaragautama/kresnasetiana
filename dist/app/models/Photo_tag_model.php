<?php
class Photo_tag_model extends Model
{
    protected $table = 'portfolio_pivot';

    public function readByPhoto($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE port_id=:id");
        $this->db->bind('id', $id);
        return $this->db->results();
    }

    public function deleteByPhoto($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE port_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteByTag($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE tag_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
