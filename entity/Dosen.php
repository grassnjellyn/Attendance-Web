<?php
class Dosen
{
    private $nik;
    private $namaDosen;
    private $email;
    private $password;
    /**@var $role Role */
    private $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        if (!isset($this->role)) {
            $this->role = new Role();
        }
        return $this->role;
    }

    /**
     * @param Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * @param mixed 
     */
    public function setNik($nik)
    {
        $this->nik = $nik;
    }

    /**
     * @return mixed
     */
    public function getNamaDosen()
    {
        return $this->namaDosen;
    }

    /**
     * @param mixed $name
     */
    public function setNamaDosen($namaDosen)
    {
        $this->namaDosen = $namaDosen;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed 
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed 
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function __set($name, $value)
    {
        if (!isset($this->role)) {
            $this->role = new Role();
        }
        switch ($name) {
            case 'nama_dosen':
                $this->namaDosen = $value;
                break;
            case 'role_id_role':
                $this->role->setIdRole($value);
                break;
            case 'role_name':
                $this->role->setName($value);
                break;
        }
    }
}