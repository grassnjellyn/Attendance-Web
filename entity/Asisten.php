<?php

class Asisten
{
    private $nrp;
    private $namaMahasiswa;

    /**
     * @return mixed
     */
    public function getNrp()
    {
        return $this->nrp;
    }

    /**
     * @param mixed $nrp
     */
    public function setNrp($nrp)
    {
        $this->nrp = $nrp;
    }

    /**
     * @return mixed
     */
    public function getNamaMahasiswa()
    {
        return $this->namaMahasiswa;
    }

    /**
     * @param mixed $namaMahasiswa
     */
    public function setNamaMahasiswa($namaMahasiswa)
    {
        $this->namaMahasiswa = $namaMahasiswa;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'nama_mahasiswa':
                $this->namaMahasiswa = $value;
                break;
        }
    }
}