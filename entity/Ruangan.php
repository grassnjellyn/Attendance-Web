<?php

class Ruangan
{
    private $idRuangan;
    private $namaRuangan;

    /**
     * @return mixed
     */
    public function getIdRuangan()
    {
        return $this->idRuangan;
    }

    /**
     * @param mixed $idRuangan
     */
    public function setIdRuangan($idRuangan)
    {
        $this->idRuangan = $idRuangan;
    }

    /**
     * @return mixed
     */
    public function getNamaRuangan()
    {
        return $this->namaRuangan;
    }

    /**
     * @param mixed $namaRuangan
     */
    public function setNamaRuangan($namaRuangan)
    {
        $this->namaRuangan = $namaRuangan;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id_ruangan':
                $this->idRuangan = $value;
                break;
            case 'nama_ruangan':
                $this->namaRuangan = $value;
                break;
        }
    }
}