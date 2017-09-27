<?php

class Users extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=60, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=false)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=false)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    protected $mail;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_create;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    
    protected $role;

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
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field mail
     *
     * @param string $mail
     * @return $this
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field date_create
     *
     * @param string $date_create
     * @return $this
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

   
    /**
     * Method to set the value of field role
     *
     * @param integer $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

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
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field date_create
     *
     * @return string
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

   
    /**
     * Returns the value of field role
     *
     * @return integer
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('role', 'Roles', 'code', ['alias' => 'Roles']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
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
        return 'Users';
    }

}
