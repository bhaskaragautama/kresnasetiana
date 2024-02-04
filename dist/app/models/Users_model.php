<?php
class Users_model extends Model
{
   protected $table = 'users';

   public function readByPin($pin)
   {
      $this->db->query("SELECT * FROM `$this->table` WHERE `pinhash`=:pinhash");
      $this->db->bind("pinhash", $pin);
      return $this->db->result();
   }
}
