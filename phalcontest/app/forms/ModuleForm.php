<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;



class ModuleForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
        $code = new Text('code');
        $code->setLabel('Barcode: ');
        $code->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Mã module',
            'required' => ''
        ));
        $code->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mã module không được bỏ trống.'
            ))
        ));
        $this->add($code);

         $name = new Text('name');
        $name->setLabel('Tên Module: ');
        $name->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Tên module',
            'required' => ''
        ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Module không được bỏ trống.'
            ))
        ));
        $this->add($name);


        $type_cer = new Select('type_cer' , Certificate::find() , array(
            'using' => array('id' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn loại module' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $type_cer->setLabel('Loại module:');
        $this->add($type_cer);

        

     

    }
 public function messages($name)
    {
        if ($this->getMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }

}

