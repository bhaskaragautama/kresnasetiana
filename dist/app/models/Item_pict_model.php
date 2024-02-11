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

    public function deleteByItem($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE store_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
