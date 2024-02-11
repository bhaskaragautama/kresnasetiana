<?php
class Story_model extends Model
{
    protected $table = 'stories';

    // override
    public function readAll()
    {
        $this->db->query("SELECT a.*, b.category, (SELECT COUNT(id) FROM stories_pict WHERE is_best=1 AND `stories_pict`.`story_id`=a.`id`) AS best FROM `$this->table` a JOIN stories_cat b ON a.cat_id=b.id ORDER BY `id` DESC");
        return $this->db->results();
    }

    // override
    public function readById($id)
    {
        $this->db->query("SELECT a.*, b.category FROM `$this->table` a JOIN stories_cat b ON a.cat_id=b.id WHERE a.`id`=:id");
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function readByCategory($catId)
    {
        $this->db->query("SELECT `stories`.*, `stories_cat`.`category`, (SELECT `picture` FROM `stories_pict` WHERE `stories`.`id`=stories_pict.`story_id` LIMIT 1) AS `picture` FROM `stories` JOIN `stories_cat` ON `stories`.`cat_id`=`stories_cat`.`id` WHERE `stories`.`cat_id`=:cat_id");
        $this->db->bind('cat_id', $catId);
        return $this->db->results();
    }

    public function checkSeries($seriesId)
    {
        $this->db->query("SELECT * FROM $this->table WHERE cat_id=:cat_id");
        $this->db->bind('cat_id', $seriesId);
        return sizeof($this->db->results());
    }
}
