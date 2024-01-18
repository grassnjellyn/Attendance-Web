<?php

class Semester
{
    private $idSemester;
    private $namaTahunSemester;

    /**
     * @return mixed
     */
    public function getIdSemester()
    {
        return $this->idSemester;
    }

    /**
     * @param mixed $idSemester
     */
    public function setIdSemester($idSemester)
    {
        $this->idSemester = $idSemester;
    }

    /**
     * @return mixed
     */
    public function getNamaTahunSemester()
    {
        return $this->namaTahunSemester;
    }

    /**
     * @param mixed $namaTahunSemester
     */
    public function setNamaTahunSemester($namaTahunSemester)
    {
        $this->namaTahunSemester = $namaTahunSemester;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id_semester':
                $this->idSemester = $value;
                break;
            case 'nama_tahun_semester':
                $this->namaTahunSemester = $value;
                break;
        }
    }
}