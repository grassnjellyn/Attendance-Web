<?php

class Prodi
{
    private $idProdi;
    private $namaProdi;
    private $tingkatanProdi;

    /**
     * @return mixed
     */
    public function getIdProdi()
    {
        return $this->idProdi;
    }

    /**
     * @param mixed $idProdi
     */
    public function setIdProdi($idProdi)
    {
        $this->idProdi = $idProdi;
    }

    /**
     * @return mixed
     */
    public function getNamaProdi()
    {
        return $this->namaProdi;
    }

    /**
     * @param mixed $namaProdi
     */
    public function setNamaProdi($namaProdi)
    {
        $this->namaProdi = $namaProdi;
    }

    /**
     * @return mixed
     */
    public function getTingkatanProdi()
    {
        return $this->tingkatanProdi;
    }

    /**
     * @param mixed $tingkatanProdi
     */
    public function setTingkatanProdi($tingkatanProdi)
    {
        $this->tingkatanProdi = $tingkatanProdi;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id_prodi':
                $this->idProdi = $value;
                break;
            case 'nama_prodi':
                $this->namaProdi = $value;
                break;
            case 'tingkatan_prodi':
                $this->tingkatanProdi = $value;
                break;
        }
    }
}