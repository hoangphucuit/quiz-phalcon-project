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



class RolesForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
        
        $id = new Text('name');
        $id->setLabel('Tên vai trò thành viên: ');
        $id->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Tên vai trò thành viên',
            'required' => ''
        ));
        $id->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tên vai trò thành viên không được bỏ trống.'
            ))
        ));
        $this->add($id);

    }
}

