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
use Phalcon\Forms\Element\Time;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;


class MaketestForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
    	$numtest=new Text('numtest');
    	$numtest->setLabel('Số lượng đề thi: ');
        $numtest->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số lượng đề thi',
            'required' => ''
        ));
        $numtest->addValidators(array(
            new PresenceOf(array(
                'message' => 'Số lượng đề thi không được bỏ trống.'
            ))
        ));
        $this->add($numtest);


        $schedule_id = new Select('schedule_id' , Schedule::find() , array(
            'using' => array('id' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn lịch thi' ,
            'emptyValue' => '' ,
            'required' => '',
            'class' => 'form-control'
            ));
        $schedule_id->setLabel('Loại lịch(khóa) thi:');
        $this->add($schedule_id);


      

       
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