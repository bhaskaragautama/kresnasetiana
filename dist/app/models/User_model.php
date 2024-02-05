<?php
class User_model extends Model
{
   protected $table = 'users';

   public function readByUsernamePassword($username, $password)
   {
      $this->db->query("SELECT * FROM `$this->table` WHERE `username`=:username AND `password`=MD5(:password)");
      $this->db->bind("username", $username);
      $this->db->bind("password", $password);
      return $this->db->result();
   }
}
