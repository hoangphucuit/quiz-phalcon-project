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


class ScheduleForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
    	$id=new Text('id');
    	$id->setLabel('Mã lịch thi: ');
        $id->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập mã lịch thi',
            'required' => ''
        ));
        $id->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mã lịch thi không được bỏ trống.'
            ))
        ));
        $this->add($id);

        $name=new Text('name');
        $name->setLabel('Tên lịch thi(khóa thi): ');
        $name->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Tên(mô tả) lịch thi',
            'required' => ''
        ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tên lịch thi không được bỏ trống.'
            ))
        ));
        $this->add($name);

        

        $date=new Text('date');
    	$date->setLabel('Ngày thi: ');
        $date->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập Ngày thi theo dạng yyyy/mm/dd',
            'required' => ''
        ));
        $date->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ngày thi không được bỏ trống.'
            ))
        ));
        $this->add($date);

        $time_start=new Text('time_start');
        $time_start->setLabel('Giờ  bắt đầu thi: ');
        $time_start->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập Giờ bắt đầu thi theo dạng hh:mm:ss',
            'required' => ''
        ));
        $time_start->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ngày thi không được bỏ trống.'
            ))
        ));
        $this->add($time_start);

        $time=new Text('time');
    	$time->setLabel('Thời gian thi: ');
        $time->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập thời gian thi(số phút)',
            'required' => ''
        ));
        $time->addValidators(array(
            new PresenceOf(array(
                'message' => 'Thời gian không được bỏ trống.'
            ))
        ));
        $this->add($time);

        $numquestion=new Text('numquestion');
        $numquestion->setLabel('Tổng số câu hỏi: ');
        $numquestion->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập tổng số câu hỏi',
            'required' => ''
        ));
        $numquestion->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tổng số câu hỏi không được bỏ trống'
            ))
        ));
        $this->add($numquestion);

        $cer_id = new Select('cer_id' , Certificate::find() , array(
            'using' => array('id' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn mã chứng chỉ' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $cer_id->setLabel('Loại chứng chỉ:');
        $this->add($cer_id);

        $nummodule1=new Text('nummodule1');
        $nummodule1->setLabel('Số câu hỏi trong module 1: ');
        $nummodule1->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule1);

        $nummodule2=new Text('nummodule2');
        $nummodule2->setLabel('Số câu hỏi trong module 2: ');
        $nummodule2->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule2);

        $nummodule3=new Text('nummodule3');
        $nummodule3->setLabel('Số câu hỏi trong module 3: ');
        $nummodule3->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule3);

        $nummodule4=new Text('nummodule4');
        $nummodule4->setLabel('Số câu hỏi trong module 4: ');
        $nummodule4->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
       
        $this->add($nummodule4);

        $nummodule5=new Text('nummodule5');
        $nummodule5->setLabel('Số câu hỏi trong module 5: ');
        $nummodule5->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule5);

        $nummodule6=new Text('nummodule6');
        $nummodule6->setLabel('Số câu hỏi trong module 6: ');
        $nummodule6->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule6);

        $nummodule7=new Text('nummodule7');
        $nummodule7->setLabel('Số câu hỏi trong module 7: ');
        $nummodule7->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule7);

        $nummodule8=new Text('nummodule8');
        $nummodule8->setLabel('Số câu hỏi trong module 8: ');
        $nummodule8->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule8);

        $nummodule9=new Text('nummodule9');
        $nummodule9->setLabel('Số câu hỏi trong module 9: ');
        $nummodule9->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập số câu hỏi',
            
        ));
        
        $this->add($nummodule9);


      

       
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