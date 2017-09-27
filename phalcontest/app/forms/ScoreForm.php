<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Date,
    Phalcon\Forms\Element\Numeric,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Check;

use Phalcon\Validation\Validator\PresenceOf;



class ScoreForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
        
        $student_id = new Select('student_id' , Users::find() , array(
            'using' => array('id' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn sinh viên' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $student_id->setLabel('Sinh viên:');
        $this->add($student_id);

         $sche_id = new Select('sche_id' , Schedule::find() , array(
            'using' => array('id' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn ca thi/khoá thi' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $sche_id->setLabel('Ca thi/khóa thi:');
        $this->add($sche_id);

    }
}

