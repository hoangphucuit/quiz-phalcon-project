<?php

class Certificate extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=10, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    protected $name;

    /**
     * Method to set the value of field id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Returns the value of field id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Module', 'type_cer', ['alias' => 'Module']);
        $this->hasMany('id', 'ResultTest', 'cer_id', ['alias' => 'ResultTest']);
        $this->hasMany('id', 'Schedule', 'cer_id', ['alias' => 'Schedule']);
        $this->hasMany('id', 'Score', 'cer_id', ['alias' => 'Score']);
        $this->hasMany('id', 'Test', 'cer_id', ['alias' => 'Test']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Certificate[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Certificate
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'certificate';
    }

}
