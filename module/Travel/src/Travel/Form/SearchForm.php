<?php
  namespace Travel\Form;

 use Zend\Form\Form;

 class SearchForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('search');

        ;
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             
         ));
         
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }
