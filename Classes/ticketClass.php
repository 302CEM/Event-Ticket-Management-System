<?php

// ticket class which has map for the whole
// ticket table in the database.



require_once('dbClass.php');


class Ticket {
   private $pdo;
   public  $table;
   public  $eventId;
   public  $owner;
   public  $status;
   public  $pincode;
   

   function __construct() {
      $this->pdo = new DB;
      $this->table = 'tickets';
      $this->id = 'id';
      
      $this->eventid = 'event_Id';
      $this->owner = 'ticket_holder';
      $this->status = 'status';
      $this->pincode = 'ticket_pin';
   }








}