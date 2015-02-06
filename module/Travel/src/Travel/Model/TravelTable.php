<?php
  namespace Travel\Model;

 use Zend\Db\TableGateway\TableGateway;

 class TravelTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getTravel($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveTravel(Destination $travel)
     {
         $data = array(
             'artist' => $travel->artist,
             'title'  => $travel->title,
         );

         $id = (int) $travel->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getTravel($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Travel id does not exist');
             }
         }
     }

     public function deleteTravel($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
?>
