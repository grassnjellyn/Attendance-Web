<?php
include_once 'entity/Jadwal.php';

class Detail
{
    private $pertemuanKe;
    private $tanggal;
    private $waktuMulai;
    private $jumlahMahasiswa;
    private $materi;
    private $keterangan;
    private $dibantuAsisten;
    private $bukti;
    /**@var $jadwal Jadwal */
    private $jadwal;
    
    /**
     * @return mixed
     */
    public function getPertemuanKe()
    {
        return $this->pertemuanKe;
    }

    /**
     * @param mixed $pertemuanKe
     */
    public function setPertemuanKe($pertemuanKe)
    {
        $this->pertemuanKe = $pertemuanKe;
    }

    /**
     * @return mixed
     */
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * @param mixed $tanggal
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
     * @return mixed
     */
    public function getWaktuMulai()
    {
        return $this->waktuMulai;
    }

    /**
     * @param mixed $waktuMulai
     */
    public function setWaktuMulai($waktuMulai)
    {
        $this->waktuMulai = $waktuMulai;
    }

    /**
     * @return mixed
     */
    public function getJumlahMahasiswa()
    {
        return $this->jumlahMahasiswa;
    }

    /**
     * @param mixed $jumlahMahasiswa
     */
    public function setJumlahMahasiswa($jumlahMahasiswa)
    {
        $this->jumlahMahasiswa = $jumlahMahasiswa;
    }

    /**
     * @return mixed
     */
    public function getMateri()
    {
        return $this->materi;
    }

    /**
     * @param mixed $materi
     */
    public function setMateri($materi)
    {
        $this->materi = $materi;
    }

    /**
     * @return mixed
     */
    public function getKeterangan()
    {
        return $this->keterangan;
    }

    /**
     * @param mixed $keterangan
     */
    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    /**
     * @return mixed
     */
    public function getDibantuAsisten()
    {
        return $this->dibantuAsisten;
    }

    /**
     * @param mixed $dibantuAsisten
     */
    public function setDibantuAsisten($dibantuAsisten)
    {
        $this->dibantuAsisten = $dibantuAsisten;
    }

    /**
     * @return mixed
     */
    public function getBukti()
    {
        return $this->bukti;
    }

    /**
     * @param mixed $bukti
     */
    public function setBukti($bukti)
    {
        $this->bukti = $bukti;
    }

    /**
     * @return Jadwal
     */
    public function getJadwal()
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        return $this->jadwal;
    }

    /**
     * @param Jadwal $jadwal
     */
    public function setJadwal($jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function __set($name, $value)
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        switch ($name) {
            case 'pertemuan_ke':
                $this->pertemuanKe = $value;
                break;
            case 'waktu_mulai':
                $this->waktuMulai = $value;
                break;
            case 'jumlah_mahasiswa':
                $this->jumlahMahasiswa = $value;
                break;
            case 'dibantu_asisten':
                $this->dibantuAsisten = $value;
                break;
            case 'jadwal_kelas_jadwal':
                $this->jadwal->setKelasJadwal($value);
                break;
            case 'jadwal_semester_id_semester':
                $this->jadwal->semester->setIdSemester($value);
                break;
            case 'jadwal_dosen_nik':
                $this->jadwal->dosen->setNik($value);
                break;
            case 'jadwal_matkul_kode_mk':
                $this->jadwal->matkul->setKodeMk($value);
                break;
            case 'jadwal_tipe_jadwal':
                $this->jadwal->setTipeJadwal($value);
                break;
        }
    }
}