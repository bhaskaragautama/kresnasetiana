<?php
class Story_pict_model extends Model
{
    protected $table = 'stories_pict';

    public function readByStory($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE story_id=:id ORDER BY id ASC");
        $this->db->bind('id', $id);
        return $this->db->results();
    }

    public function readThumb($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE story_id=:id AND is_thumb=1");
        $this->db->bind('id', $id);
        return $this->db->results();
    }

    public function resetBest($id)
    {
        $this->db->query("UPDATE $this->table SET is_best=0 WHERE story_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function resetThumb($id)
    {
        $this->db->query("UPDATE $this->table SET is_thumb=0 WHERE story_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteByStory($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE story_id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
