<?php
class Item_model extends Model
{
    protected $table = 'store';

    // override
    public function readAll()
    {
        $this->db->query("SELECT a.*, b.category, (SELECT COUNT(id) FROM store_pict WHERE is_best=1 AND `store_pict`.`store_id`=a.`id`) AS best FROM `$this->table` a JOIN store_cat b ON a.cat_id=b.id ORDER BY `id` DESC");
        return $this->db->results();
    }

    // override
    public function readById($id)
    {
        $this->db->query("SELECT a.*, b.category FROM `$this->table` a JOIN store_cat b ON a.cat_id=b.id WHERE a.`id`=:id");
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function checkCollection($collectionId)
    {
        $this->db->query("SELECT * FROM $this->table WHERE cat_id=:cat_id");
        $this->db->bind('cat_id', $collectionId);
        return sizeof($this->db->results());
    }
}
