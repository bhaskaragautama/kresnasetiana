<?php
class Best_model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function readAll()
    {
        $this->db->query("SELECT `id`, `picture`, 'portfolio' AS `tablename` FROM `portfolio` WHERE `is_best`=1 UNION SELECT `id`, `picture`, 'store_pict' AS `tablename` FROM `store_pict` WHERE `is_best`=1 UNION SELECT `id`, `picture`, 'stories_pict' AS `tablename` FROM `stories_pict` WHERE `is_best`=1");
        return $this->db->results();
    }

    public function updateBest($table, $id)
    {
        $this->db->query("UPDATE $table SET is_best=0 WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
