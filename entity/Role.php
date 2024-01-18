<?php

class Role
{
    private $idRole;
    private $name;

    /**
     * @return mixed
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * @param mixed $idRole
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id_role':
                $this->idRole = $value;
                break;
        }
    }
}