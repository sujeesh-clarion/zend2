<?php
 namespace Travel\Model;

 class Travel
 {
     public $id;
     public $title;
    // public $city;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->title = (!empty($data['title'])) ? $data['title'] : null;
        // $this->title  = (!empty($data['title'])) ? $data['title'] : null;
     }
 }

