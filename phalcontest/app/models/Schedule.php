<?php

class Schedule extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $datetime;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $time;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $cer_id;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    protected $teacher_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $numquestion;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule1;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule2;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule3;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule4;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule5;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule6;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule7;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule8;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $nummodule9;

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
     * Method to set the value of field datetime
     *
     * @param string $datetime
     * @return $this
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Method to set the value of field time
     *
     * @param integer $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Method to set the value of field cer_id
     *
     * @param string $cer_id
     * @return $this
     */
    public function setCerId($cer_id)
    {
        $this->cer_id = $cer_id;

        return $this;
    }

    /**
     * Method to set the value of field teacher_id
     *
     * @param string $teacher_id
     * @return $this
     */
    public function setTeacherId($teacher_id)
    {
        $this->teacher_id = $teacher_id;

        return $this;
    }

    /**
     * Method to set the value of field numquestion
     *
     * @param integer $numquestion
     * @return $this
     */
    public function setNumquestion($numquestion)
    {
        $this->numquestion = $numquestion;

        return $this;
    }

    /**
     * Method to set the value of field nummodule1
     *
     * @param integer $nummodule1
     * @return $this
     */
    public function setNummodule1($nummodule1)
    {
        $this->nummodule1 = $nummodule1;

        return $this;
    }

    /**
     * Method to set the value of field nummodule2
     *
     * @param integer $nummodule2
     * @return $this
     */
    public function setNummodule2($nummodule2)
    {
        $this->nummodule2 = $nummodule2;

        return $this;
    }

    /**
     * Method to set the value of field nummodule3
     *
     * @param integer $nummodule3
     * @return $this
     */
    public function setNummodule3($nummodule3)
    {
        $this->nummodule3 = $nummodule3;

        return $this;
    }

    /**
     * Method to set the value of field nummodule4
     *
     * @param integer $nummodule4
     * @return $this
     */
    public function setNummodule4($nummodule4)
    {
        $this->nummodule4 = $nummodule4;

        return $this;
    }

    /**
     * Method to set the value of field nummodule5
     *
     * @param integer $nummodule5
     * @return $this
     */
    public function setNummodule5($nummodule5)
    {
        $this->nummodule5 = $nummodule5;

        return $this;
    }

    /**
     * Method to set the value of field nummodule6
     *
     * @param integer $nummodule6
     * @return $this
     */
    public function setNummodule6($nummodule6)
    {
        $this->nummodule6 = $nummodule6;

        return $this;
    }

    /**
     * Method to set the value of field nummodule7
     *
     * @param integer $nummodule7
     * @return $this
     */
    public function setNummodule7($nummodule7)
    {
        $this->nummodule7 = $nummodule7;

        return $this;
    }

    /**
     * Method to set the value of field nummodule8
     *
     * @param integer $nummodule8
     * @return $this
     */
    public function setNummodule8($nummodule8)
    {
        $this->nummodule8 = $nummodule8;

        return $this;
    }

    /**
     * Method to set the value of field nummodule9
     *
     * @param integer $nummodule9
     * @return $this
     */
    public function setNummodule9($nummodule9)
    {
        $this->nummodule9 = $nummodule9;

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
     * Returns the value of field datetime
     *
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Returns the value of field time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Returns the value of field cer_id
     *
     * @return string
     */
    public function getCerId()
    {
        return $this->cer_id;
    }

    /**
     * Returns the value of field teacher_id
     *
     * @return string
     */
    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    /**
     * Returns the value of field numquestion
     *
     * @return integer
     */
    public function getNumquestion()
    {
        return $this->numquestion;
    }

    /**
     * Returns the value of field nummodule1
     *
     * @return integer
     */
    public function getNummodule1()
    {
        return $this->nummodule1;
    }

    /**
     * Returns the value of field nummodule2
     *
     * @return integer
     */
    public function getNummodule2()
    {
        return $this->nummodule2;
    }

    /**
     * Returns the value of field nummodule3
     *
     * @return integer
     */
    public function getNummodule3()
    {
        return $this->nummodule3;
    }

    /**
     * Returns the value of field nummodule4
     *
     * @return integer
     */
    public function getNummodule4()
    {
        return $this->nummodule4;
    }

    /**
     * Returns the value of field nummodule5
     *
     * @return integer
     */
    public function getNummodule5()
    {
        return $this->nummodule5;
    }

    /**
     * Returns the value of field nummodule6
     *
     * @return integer
     */
    public function getNummodule6()
    {
        return $this->nummodule6;
    }

    /**
     * Returns the value of field nummodule7
     *
     * @return integer
     */
    public function getNummodule7()
    {
        return $this->nummodule7;
    }

    /**
     * Returns the value of field nummodule8
     *
     * @return integer
     */
    public function getNummodule8()
    {
        return $this->nummodule8;
    }

    /**
     * Returns the value of field nummodule9
     *
     * @return integer
     */
    public function getNummodule9()
    {
        return $this->nummodule9;
    }

    /**
     * Method to set the value of field room
     *
     * @param string $room
     * @return $this
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Returns the value of field room
     *
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Test', 'sche_id', ['alias' => 'Test']);
        $this->hasMany('id', 'Score', 'sche_id', ['alias' => 'Score']);
        $this->belongsTo('cer_id', 'Certificate', 'id', ['alias' => 'Certificate']);
        $this->belongsTo('teacher_id', 'Users', 'id', ['alias' => 'Users']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Schedule[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Schedule
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
        return 'Schedule';
    }

}
