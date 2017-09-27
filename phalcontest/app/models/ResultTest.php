<?php

class ResultTest extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $test_id;

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
    protected $ques_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $A;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $B;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $C;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $D;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $answer;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $correctanswer;

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
     * Method to set the value of field ques_id
     *
     * @param string $ques_id
     * @return $this
     */
    public function setQuesId($ques_id)
    {
        $this->ques_id = $ques_id;

        return $this;
    }

    /**
     * Method to set the value of field A
     *
     * @param string $A
     * @return $this
     */
    public function setA($A)
    {
        $this->A = $A;

        return $this;
    }

    /**
     * Method to set the value of field B
     *
     * @param string $B
     * @return $this
     */
    public function setB($B)
    {
        $this->B = $B;

        return $this;
    }

    /**
     * Method to set the value of field C
     *
     * @param string $C
     * @return $this
     */
    public function setC($C)
    {
        $this->C = $C;

        return $this;
    }

    /**
     * Method to set the value of field D
     *
     * @param string $D
     * @return $this
     */
    public function setD($D)
    {
        $this->D = $D;

        return $this;
    }

    /**
     * Method to set the value of field answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Method to set the value of field correctanswer
     *
     * @param string $correctanswer
     * @return $this
     */
    public function setCorrectanswer($correctanswer)
    {
        $this->correctanswer = $correctanswer;

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
     * Returns the value of field cer_id
     *
     * @return string
     */
    public function getCerId()
    {
        return $this->cer_id;
    }

    /**
     * Returns the value of field ques_id
     *
     * @return string
     */
    public function getQuesId()
    {
        return $this->ques_id;
    }

    /**
     * Returns the value of field A
     *
     * @return string
     */
    public function getA()
    {
        return $this->A;
    }

    /**
     * Returns the value of field B
     *
     * @return string
     */
    public function getB()
    {
        return $this->B;
    }

    /**
     * Returns the value of field C
     *
     * @return string
     */
    public function getC()
    {
        return $this->C;
    }

    /**
     * Returns the value of field D
     *
     * @return string
     */
    public function getD()
    {
        return $this->D;
    }

    /**
     * Returns the value of field answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Returns the value of field correctanswer
     *
     * @return string
     */
    public function getCorrectanswer()
    {
        return $this->correctanswer;
    }

    /**
     * Initialize method for model.
     */

    


    public function initialize()
    {
        $this->belongsTo('test_id', 'Test', 'id', ['alias' => 'Test']);
        $this->belongsTo('cer_id', 'Certificate', 'id', ['alias' => 'Certificate']);
        $this->belongsTo('ques_id', 'Question', 'id', ['alias' => 'Question']);
        
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'result_test';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResultTest[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResultTest
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
