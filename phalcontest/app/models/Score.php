<?php

class Score extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $student_id;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $test_id;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    protected $theory_score;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    protected $practice_score;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $cer_id;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $sche_id;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field student_id
     *
     * @param string $student_id
     * @return $this
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;

        return $this;
    }

    /**
     * Method to set the value of field test_id
     *
     * @param string $test_id
     * @return $this
     */
    public function setTestId($test_id)
    {
        $this->test_id = $test_id;

        return $this;
    }

    /**
     * Method to set the value of field theory_score
     *
     * @param double $theory_score
     * @return $this
     */
    public function setTheoryScore($theory_score)
    {
        $this->theory_score = $theory_score;

        return $this;
    }

    /**
     * Method to set the value of field practice_score
     *
     * @param double $practice_score
     * @return $this
     */
    public function setPracticeScore($practice_score)
    {
        $this->practice_score = $practice_score;

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
     * Method to set the value of field sche_id
     *
     * @param string $sche_id
     * @return $this
     */
    public function setScheId($sche_id)
    {
        $this->sche_id = $sche_id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field student_id
     *
     * @return string
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * Returns the value of field test_id
     *
     * @return string
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * Returns the value of field theory_score
     *
     * @return double
     */
    public function getTheoryScore()
    {
        return $this->theory_score;
    }

    /**
     * Returns the value of field practice_score
     *
     * @return double
     */
    public function getPracticeScore()
    {
        return $this->practice_score;
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
     * Returns the value of field sche_id
     *
     * @return string
     */
    public function getScheId()
    {
        return $this->sche_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('test_id', 'Test', 'id', ['alias' => 'Test']);
        $this->belongsTo('cer_id', 'Certificate', 'id', ['alias' => 'Certificate']);
        $this->belongsTo('sche_id', 'Schedule', 'id', ['alias' => 'Schedule']);
        $this->belongsTo('student_id', 'Users', 'id', ['alias' => 'Users']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'score';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Score[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Score
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    

}
