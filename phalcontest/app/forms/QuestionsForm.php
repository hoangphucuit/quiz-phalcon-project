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



class QuestionsForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {
        $id = new Text('id');
        $id->setLabel('Barcode: ');
        $id->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Mã câu hỏi',
            'required' => ''
        ));
        $id->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mã câu hỏi không được bỏ trống.'
            ))
        ));
        $this->add($id);

        $kindcode = new Select('kindcode' , Module::find() , array(
            'using' => array('code' , 'name') ,
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn môn học' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $kindcode->setLabel('Loại môn học:');
        $this->add($kindcode);

        $question = new Text('question');
        $question->setLabel('Câu hỏi: ');
        $question->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Nội dung câu hỏi',
            'required' => ''
        ));
        $question->addValidators(array(
            new PresenceOf(array(
                'message' => 'Nội dung câu hỏi không được bỏ trống.'
            ))
        ));
        $this->add($question);

        $answer1 = new Text('answer1');
        $answer1->setLabel('Đáp án A: ');
        $answer1->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Đáp án A',
            'required' => ''
        ));
        $this->add($answer1);

        $answer2 = new Text('answer2');
        $answer2->setLabel('Đáp án B: ');
        $answer2->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Đáp án B',
            'required' => ''
        ));
        $this->add($answer2);

        $answer3 = new Text('answer3');
        $answer3->setLabel('Đáp án C: ');
        $answer3->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Đáp án C',
            'required' => ''
        ));
        $this->add($answer3);

        $answer4 = new Text('answer4');
        $answer4->setLabel('Đáp án D: ');
        $answer4->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Đáp án D',
            'required' => ''
        ));
        $this->add($answer4);

     /*  $correctanswer1 = new Text('correctanswer');
        $correctanswer1->setLabel('Đáp án đúng: ');
        $correctanswer1->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Vui lòng nhập một chứ cái A, B, C, D chỉ đáp án đúng',
            'required' => ''
        ));
        $this->add($correctanswer1);*/

        $correctanswer = new Select('correctanswer' , array('A' => 'A','B' => 'B','C' => 'C','D' => 'D') , array(
            
            'useEmpty' => true ,
            'emptyText' => 'Vui lòng chọn đáp án đúng' ,
            'emptyValue' => '' ,
            'class' => 'form-control'
            ));
        $correctanswer->setLabel('Đáp án đúng:');
        $this->add($correctanswer);

        $image = new Text('image');
        $image->setLabel('Url hình ảnh: ');
        $image->setAttributes(array(
            'class' => 'form-control',
            'placeholder' => 'Url hình ảnh(nếu có)',
            
        ));
        $this->add($image);
        

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

