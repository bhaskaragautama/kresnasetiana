<?php
class Tag_model extends Model
{
    protected $table = 'portfolio_tag';

    public function readNameOrder()
    {
        $this->db->query("SELECT * FROM $this->table ORDER BY tag ASC");
        return $this->db->results();
    }
}
