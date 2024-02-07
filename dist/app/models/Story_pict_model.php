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
}
