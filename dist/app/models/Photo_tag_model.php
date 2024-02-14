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

    public function readByTag($tag)
    {
        $sql = "SELECT DISTINCT(`portfolio`.`id`), `portfolio`.`picture`, `portfolio`.`title` FROM `$this->table` JOIN `portfolio` ON `$this->table`.`port_id`=`portfolio`.`id`";
        if (sizeof($tag) > 0) {
            $sql .= " WHERE `$this->table`.`tag_id` IN(" . implode(', ', $tag) . ") GROUP BY `portfolio`.`id` HAVING COUNT(DISTINCT `$this->table`.`tag_id`) = " . sizeof($tag) . " AND COUNT(*) = " . sizeof($tag) . "";
        }
        $sql .= " ORDER BY `portfolio`.`id` DESC";
        $this->db->query($sql);
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
