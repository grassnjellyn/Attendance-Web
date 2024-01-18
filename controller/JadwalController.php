<?php

class JadwalController
{
    private $jadwalDao;
    private $detailDao;
    private $jadwalHasAsistenDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
        $this->detailDao = new DetailDaoImpl();
        $this->jadwalHasAsistenDao = new JadwalHasAsistenDaoImpl();
    }
    public function index()
    {
        /* fungsi delete jadwal */
        $deleteApproved = filter_input(INPUT_GET, 'delcomJadwal');
        if (isset($deleteApproved) && $deleteApproved == 1) {
            $deletedKelas = filter_input(INPUT_GET, 'dkJadwal');
            $deletedMatkul = filter_input(INPUT_GET, 'dmJadwal');
            $deletedDosen = filter_input(INPUT_GET, 'ddJadwal');
            $deletedSemester = filter_input(INPUT_GET, 'dsJadwal');
            $deletedTipe = filter_input(INPUT_GET, 'dtJadwal');
            $result = $this->jadwalDao->deleteJadwal($deletedKelas, $deletedMatkul, $deletedDosen, $deletedSemester, $deletedTipe);
        }
        $jadwal = $this->jadwalDao->fetchAllJadwal();
        include_once 'view/jadwal-view.php';
    }

    public function addJadwal(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddJadwal');
        if(isset($buttonPressed)) {
            $kelas = filter_input(INPUT_POST,'kelas');
            $hari = filter_input(INPUT_POST,'hari');
            $waktuMulai = filter_input(INPUT_POST,'waktuMulai');
            $matkul = filter_input(INPUT_POST,'matkul');
            $dosen = filter_input(INPUT_POST,'dosen');
            $semester = filter_input(INPUT_POST,'semester');
            $ruangan = filter_input(INPUT_POST,'ruangan');
            $tipe = filter_input(INPUT_POST,'tipe');
//            $nrp1 = filter_input(INPUT_POST, 'nrp1');

            $trimmedKelas = trim($kelas);
            $trimmedHari = trim($hari);
            $trimmedWaktuMulai = trim($waktuMulai);
            $trimmedMatkul = trim(substr($matkul, 0, 5));
            $trimmedDosen = trim(substr($dosen, 0, 5));
            $trimmedSemester = trim(substr($semester, 0, 1));
            $trimmedRuangan = trim(substr($ruangan, 0, 1));
            $trimmedTipe = trim($tipe);
//            $trimmedNrp1 = trim(substr($nrp1, 0, 7));

            $jadwal = new Jadwal;
            $jadwal->setKelasJadwal($trimmedKelas);
            $jadwal->setHariJadwal($trimmedHari);
            $jadwal->setWaktuMulaiJadwal($trimmedWaktuMulai);
            $jadwal->getMatkul()->setKodeMk($trimmedMatkul);
            $jadwal->getDosen()->setNik($trimmedDosen);
            $jadwal->getSemester()->setIdSemester($trimmedSemester);
            $jadwal->getRuangan()->setIdRuangan($trimmedRuangan);
            $jadwal->setTipeJadwal($trimmedTipe);


//            $asisten1 = filter_input(INPUT_POST, 'asisten1');
//            print_r($asisten1);
//            if($asisten1=="Asisten1"){
//                $jadwalHasAsisten = new JadwalHasAsisten;
//                $jadwalHasAsisten->getJadwal()->setKelasJadwal($trimmedKelas);
//                $jadwalHasAsisten->getJadwal()->getSemester()->setIdSemester($trimmedSemester);
//                $jadwalHasAsisten->getJadwal()->getDosen()->setNik($trimmedDosen);
//                $jadwalHasAsisten->getJadwal()->getMatkul()->setKodeMk($trimmedMatkul);
//                $jadwalHasAsisten->getJadwal()->setTipeJadwal($trimmedTipe);
//                $jadwalHasAsisten->getAsisten()->setNrp($trimmedNrp1);
//                $jadwalHasAsisten->setPertemuan("");
//                $jadwalHasAsisten->setTanggal("");
//            }

            $result1 = $this->jadwalDao->saveJadwal($jadwal);
//            $result2 = $this->jadwalHasAsistenDao->saveJadwalHasAsisten($jadwalHasAsisten);
        }
        $matkul = $this->detailDao->fetchMatkul();
        $dosen = $this->detailDao->fetchDosen();
        $semester = $this->detailDao->fetchSemester();
        $ruangan = $this->detailDao->fetchRuangan();
        $jadwal = $this->jadwalDao->fetchAllJadwal();
        $jadwalHasAsisten = $this->jadwalHasAsistenDao->fetchAllJadwalHasAsisten();
        include_once 'view/jadwal-form-view.php';
    }
}