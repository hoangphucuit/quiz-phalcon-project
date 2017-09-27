<?php

class Lab extends \Phalcon\Mvc\Model
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
     * @Column(type="string", nullable=false)
     */
    protected $questionlab;

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
     * Method to set the value of field questionlab
     *
     * @param string $questionlab
     * @return $this
     */
    public function setQuestionlab($questionlab)
    {
        $this->questionlab = $questionlab;

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
     * Returns the value of field questionlab
     *
     * @return string
     */
    public function getQuestionlab()
    {
        return $this->questionlab;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'lab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lab[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lab
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    public function laysocauhoi_random($so)
    {
        return Lab::find(
                                array(
                                        
                                        "order" => "Rand()",
                                        "limit" => "$so"
                                    ));
    }

}
