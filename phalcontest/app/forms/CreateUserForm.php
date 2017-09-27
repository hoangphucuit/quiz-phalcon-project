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
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class CreateUserForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $id = new Text('id');

        $id->setLabel('Mã code:');
        $id->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Mã code id',
            'required' => ''
            ));
        $id->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mã code không được bỏ trống'
                ))
            ));
        $this->add($id);

        $username = new Text('username');

        $username->setLabel('Username:');
        $username->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Username',
            'required' => ''
            ));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Username không được bỏ trống'
                ))
            ));
        $this->add($username);


        $name = new Text('name');

        $name->setLabel('Họ và tên:');
        $name->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Họ và tên',
            'required' => ''
            ));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Họ và tên không được bỏ trống'
                ))
            ));

        $this->add($name);

        $email = new Email('mail');
        $email->setLabel('Email:');
        $email->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => "Email"
            ));
        $this->add($email);


        $password = new Password('password');
        $password->setLabel('Mật khẩu:');
        $password->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Mật khẩu',
            'required' => ''
            ));
        $this->add($password);

        $confirmPassword = new Password('confirmpassword');
        $confirmPassword->setLabel('Nhập lại mật khẩu:');
        $confirmPassword->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nhập lại mật khẩu',
            'required' => ''
            ));
        $this->add($confirmPassword);

        $phone = new Text('phone');
        $phone->setLabel('Số điện thoại:');
        $phone->setAttributes(array(
            'class' => 'form-control',
            ));
        $phone->addValidator(
            new PresenceOf(
                array(
                    'message' => 'Số điện thoại không được để trống'
                )
            )
        );
        $this->add($phone);

        $role = new Select('role' , Roles::find() , array(
            'using' => array('code' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn quyền' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $role->setLabel('Quyền:');
        $this->add($role);

        $status = new Select('status', array(
            '1' => 'Hoạt động',
            '0' => 'Ẩn',
            ), array(
            'useEmpty' => true,
            'emptyText' => 'Vui lòng chọn trạng thái',
            'emptyValue' => '',
            'class' => 'form-control'
            ));
        $status->setLabel('Trạng thái:');
        $this->add($status);

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