<?php
class Item_pict_model extends Model
{
    protected $table = 'store_pict';

    public function readByItem($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE store_id=:id");
        $this->db->bind('id', $id);
        return $this->db->results();
    }

    public function readThumb($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE store_id=:id AND is_thumb=1");
        $this->db->bind('id', $id);
        return $this->db->results();
    }

    public function resetThumb($id)
    {
        $this->db->query("UPDATE $this->table SET is_thumb=0 WHERE store_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteByItem($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE store_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
