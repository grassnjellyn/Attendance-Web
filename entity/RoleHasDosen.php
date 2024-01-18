<?php

class RoleHasDosen
{
    /**@var $role Role */
    private $role;
    /**@var $dosen Dosen */
    private $dosen;

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
     * @return Dosen
     */
    public function getDosen()
    {
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        return $this->dosen;
    }

    /**
     * @param Dosen $dosen
     */
    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    public function __set($name, $value)
    {
        if (!isset($this->role)) {
            $this->role = new Role();
        }
        if(!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        switch ($name) {
            case 'role_id_role':
                $this->role->setIdRole($value);
                break;
            case 'dosen_nik':
                $this->dosen->setNik($value);
                break;
        }
    }
}