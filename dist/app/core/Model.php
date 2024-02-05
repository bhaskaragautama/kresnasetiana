<?php
class Model
{
   protected $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function readAll()
   {
      $this->db->query("SELECT * FROM `$this->table` ORDER BY `id` DESC");
      return $this->db->results();
   }

   public function readById($id)
   {
      $this->db->query("SELECT * FROM `$this->table` WHERE `id`=:id");
      $this->db->bind("id", $id);
      return $this->db->result();
   }

   public function create($data)
   {
      $fields = ':' . implode(', :', array_keys($data));
      $this->db->query("INSERT INTO `$this->table` (" . str_replace(':', '', $fields) . ") VALUES($fields)");
      foreach ($data as $key => $value) {
         $this->db->bind($key, $value);
      }
      $this->db->execute();
      return $this->db->rowCount() >= 0 ? true : false;
   }

   public function update($data, $id)
   {
      $fields = [];
      foreach ($data as $key => $value) {
         array_push($fields, $key . '=:' . $key);
      }
      $fields = implode(', ', $fields);
      $this->db->query("UPDATE `$this->table` SET $fields WHERE `id`=:id");
      foreach ($data as $key => $value) {
         $this->db->bind($key, $value);
      }
      $this->db->bind("id", $id);
      $this->db->execute();
      return $this->db->rowCount() >= 0 ? true : false;
   }

   public function delete($id)
   {
      $this->db->query("DELETE FROM `$this->table` WHERE `id`=:id");
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
   }

   public function lastId()
   {
      return $this->db->lastInsertId();
   }
}
