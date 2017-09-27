<?php

namespace Library\Forms;


use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Date,
    Phalcon\Forms\Element\Numeric,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Check;


class SearchForm extends \Phalcon\Forms\Form
{

    public function initialize($entity = null, $options = null)
    {

        $this->add(new Text('name'));
        $this->add(new Email('mail'));
        $this->add(new Text('module'));
        $this->add(new Text('code'));
        $this->add(new Text('department'));
        $this->add(new Text('status'));
        $this->add(new Text('location'));
    }
}

