<?php
use Phalcon\Mvc\Model\Query;

class Question extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $question;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $answer1;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $answer2;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $answer3;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
     protected $answer4;

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
     protected $image;

    public function initialize()
    {
        $this->hasOne('kindcode', 'Module', 'code', ['alias' => 'Module']);
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Method to set the value of field answer1
     *
     * @param string $answer1
     * @return $this
     */
    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;

        return $this;
    }

    /**
     * Method to set the value of field answer2
     *
     * @param string $answer2
     * @return $this
     */
    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;

        return $this;
    }

    /**
     * Method to set the value of field answer3
     *
     * @param string $answer3
     * @return $this
     */
    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;

        return $this;
    }

    /**
     * Method to set the value of field correctanswer
     *
     * @param string $correctanswer
     * @return $this
     */
     public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;

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

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns the value of field answer1
     *
     * @return string
     */
    public function getAnswer1()
    {
        return $this->answer1;
    }

    /**
     * Returns the value of field answer2
     *
     * @return string
     */
    public function getAnswer2()
    {
        return $this->answer2;
    }

    /**
     * Returns the value of field answer3
     *
     * @return string
     */
    public function getAnswer3()
    {
        return $this->answer3;
    }

    /**
     * Returns the value of field correctanswer
     *
     * @return string
     */
    public function getAnswer4()
    {
        return $this->answer4;
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
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Question[]
     */

    public function getImage()
    {
        return $this->image;
    }


    public function laycauhoitheoid($id)
    {       
        return Question::findFirst("id = '$id'");
    }
    public function laysocauhoingaunhien($so)
    {
        return Question::find(
                                array(
                                        
                                        "order" => "Rand()",
                                        "limit" => "$so"
                                    ));
    }
    public function laysocauhoi_random($so,$loai)
    {
        return Question::find(
                                array(
                                        "having" => "kindcode ='$loai'" ,
                                        "order" => "Rand()",
                                        "limit" => "$so"
                                    ));
    }
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Question
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
        return 'Question';
    }

}
