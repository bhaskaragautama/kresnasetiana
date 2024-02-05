<?php
class Term_model extends Model
{
    protected $table = 'terms';

    public function updateInactive()
    {
        $this->db->query("UPDATE `$this->table` SET is_active=0");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateActive($id)
    {
        $this->db->query("UPDATE `$this->table` SET is_active=1 WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function readActive() {
        $this->db->query("SELECT * FROM `$this->table` WHERE `is_active`=1");
        return $this->db->result();
    }
}
