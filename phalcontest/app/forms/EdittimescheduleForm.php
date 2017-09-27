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


class EdittimescheduleForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {

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

        

        $datetime=new Text('datetime');
    	$datetime->setLabel('Ngày giờ thi: ');
        $datetime->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập Ngày giờ thi theo dạng yyyy/mm/dd hh:mm:ss',
            'required' => ''
        ));
        $datetime->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ngày giờ thi không được bỏ trống.'
            ))
        ));
        $this->add($datetime);

        

        $time=new Text('time');
    	$time->setLabel('Thời gian thi(phút): ');
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