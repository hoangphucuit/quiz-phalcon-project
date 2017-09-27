<?php

class Module extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=10, nullable=false)
     */
    protected $code;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $type_cer;

    /**
     * Method to set the value of field code
     *
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field type_cer
     *
     * @param string $type_cer
     * @return $this
     */
    public function setTypeCer($type_cer)
    {
        $this->type_cer = $type_cer;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field type_cer
     *
     * @return string
     */
    public function getTypeCer()
    {
        return $this->type_cer;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('type_cer', 'Certificate', 'id', ['alias' => 'Certificate']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Module';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Module[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Module
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
