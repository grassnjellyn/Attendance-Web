<?php

class Matkul
{
    private $kodeMk;
    private $namaMk;
    /**@var $prodi Prodi */
    private $prodi;
    private $jumlahSks;

    public function __construct()
    {
        $this->prodi = new Prodi();
    }

    /**
     * @return Prodi
     */
    public function getProdi()
    {
        if (!isset($this->prodi)) {
            $this->prodi = new Prodi();
        }
        return $this->prodi;
    }

    /**
     * @param Prodi $prodi
     */
    public function setProdi($prodi)
    {
        $this->prodi = $prodi;
    }
    /**
     * @return mixed
     */
    public function getKodeMk()
    {
        return $this->kodeMk;
    }

    /**
     * @param mixed $kodeMk
     */
    public function setKodeMk($kodeMk)
    {
        $this->kodeMk = $kodeMk;
    }

    /**
     * @return mixed
     */
    public function getNamaMk()
    {
        return $this->namaMk;
    }

    /**
     * @param mixed $namaMk
     */
    public function setNamaMk($namaMk)
    {
        $this->namaMk = $namaMk;
    }



    /**
     * @return mixed
     */
    public function getJumlahSks()
    {
        return $this->jumlahSks;
    }

    /**
     * @param mixed $jumlahSks
     */
    public function setJumlahSks($jumlahSks)
    {
        $this->jumlahSks = $jumlahSks;
    }

    public function __set($name, $value)
    {
        if (!isset($this->prodi)) {
            $this->prodi = new Prodi();
        }
        switch ($name) {
            case 'kode_mk':
                $this->kodeMk = $value;
                break;
            case 'nama_mk':
                $this->namaMk = $value;
                break;
            case 'jumlah_sks':
                $this->jumlahSks = $value;
                break;
            case 'prodi_id_prodi':
                $this->prodi->setIdProdi($value);
                break;
            case 'prodi_name':
                $this->prodi->setNamaProdi($value);
                break;
        }
    }
}