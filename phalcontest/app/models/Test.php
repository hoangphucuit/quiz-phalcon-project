<?php

class Test extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=10, nullable=false)
     */
    protected $cer_id;

    /**
     * Method to set the value of field id
     *
     * @param string $id
     * @return $this
     */
    protected $student_id;

    protected $sche_id;

    public function setId($id)
    {
        $this->id = $id;

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
     * Returns the value of field id
     *
     * @return string
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;

        return $this;
    }

    public function setScheId($sche_id)
    {
        $this->sche_id = $sche_id;

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
     * Returns the value of field cer_id
     *
     * @return string
     */
    public function getCerId()
    {
        return $this->cer_id;
    }

    /**
     * Initialize method for model.
     */

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function getScheId()
    {
        return $this->sche_id;
    }
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'ResultTest', 'test_id', ['alias' => 'ResultTest']);
        $this->hasMany('id', 'Score', 'test_id', ['alias' => 'Score']);
        $this->belongsTo('cer_id', 'Certificate', 'id', ['alias' => 'Certificate']);
        $this->belongsTo('sche_id', 'Schedule', 'id', ['alias' => 'Schedule']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'test';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Test[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Test
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function layde_random($schedule)
    {
        return Test::findFirst(
                                array(
                                        "having" => "student_id ='' AND sche_id ='$schedule' "  ,
                                       
                                        "order" => "Rand()",
                                        "limit" => "1" 
                                    ));
    }
}
