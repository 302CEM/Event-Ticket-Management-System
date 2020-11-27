<?php

// Event class which has map for the whole
// event table in the database.

require_once('dbClass.php');

class Event {
   private $pdo;
   public $id;
   public $table;
   public $name;
   public $date;
   public $location;
   public $description;
   public $price;


   function __construct() {
      $this->pdo = new DB();
      $this->id = 'event_id';
      $this->name = 'event_name';
      $this->date = 'event_date';
      $this->location = 'event_location';
      $this->description = 'event_description';
      $this->price = 'event_price';
      $this->table = 'events';
   }








}