<?php
class Flow_model extends Model
{
    protected $table = 'flows';

    // Override
    public function readAll()
    {
        $this->db->query("SELECT * FROM `$this->table` WHERE `id_term`=(SELECT `id` FROM `terms` WHERE `is_active`=1) ORDER BY `date` DESC, `id` DESC");
        return $this->db->results();
    }

    public function readByTerm()
    {
        $this->db->query("SELECT a.`id_term`, b.`term_name`, SUM(CASE WHEN a.`type` = 1 THEN a.`amount` ELSE 0 END) AS `income`, SUM(CASE WHEN a.`type` = 0 THEN a.`amount` ELSE 0 END) AS `expense` FROM `flows` a JOIN `terms` b ON a.`id_term`=b.`id` GROUP BY a.`id_term` ORDER BY a.`id_term` ASC");
        return $this->db->results();
    }

    public function readCurrentIn()
    {
        $this->db->query("SELECT SUM(`amount`) AS `in` FROM `$this->table` WHERE `type`=1 AND `id_term`=(SELECT `id` FROM `terms` WHERE `is_active`=1)");
        return $this->db->singleResult();
    }

    public function readCurrentOut()
    {
        $this->db->query("SELECT SUM(`amount`) AS `out` FROM `$this->table` WHERE `type`=0 AND `id_term`=(SELECT `id` FROM `terms` WHERE `is_active`=1)");
        return $this->db->singleResult();
    }

    public function readAllIn()
    {
        $this->db->query("SELECT SUM(`amount`) AS `in` FROM `$this->table` WHERE `type`=1");
        return $this->db->singleResult();
    }

    public function readAllOut()
    {
        $this->db->query("SELECT SUM(`amount`) AS `out` FROM `$this->table` WHERE `type`=0");
        return $this->db->singleResult();
    }

    public function readReport($term, $from, $to)
    {
        $sql = "SELECT `$this->table`.*, `terms`.`term_name` FROM `$this->table` JOIN `terms` ON `$this->table`.`id_term`=`terms`.`id`";
        if ($term != "" || $from != "" || $to != "") {
            $sql .= " WHERE";
        }
        if ($term != "") {
            $sql .= " `terms`.`id`=:term";
            if ($from != "" || $to != "") {
                $sql .= " AND";
            }
        }
        if ($from != "") {
            $sql .= " `$this->table`.`date`>=:from";
            if ($to != "") {
                $sql .= " AND";
            }
        }
        if ($to != "") {
            $sql .= " `$this->table`.`date`<=:to";
        }
        $sql .= " ORDER BY `$this->table`.`date` ASC";
        $this->db->query($sql);
        if ($term != "") {
            $this->db->bind('term', $term);
        }
        if ($from != "") {
            $this->db->bind('from', $from);
        }
        if ($to != "") {
            $this->db->bind('to', $to);
        }
        return $this->db->results();
    }
}
