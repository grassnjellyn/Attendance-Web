<?php

class DetailDaoImpl
{
    public function fetchAllDetail()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM detail';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Detail');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchDetailByNik($nik) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM detail WHERE jadwal_dosen_nik = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nik);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Detail');
    }

    public function fetchDetailByKelasMk($kelasMk) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM detail WHERE jadwal_dosen_nik = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nik);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Detail');
    }

    public function fetchProdi() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT nama_prodi FROM prodi';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prodi');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchMatkul() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM matkul';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchDosen() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM dosen';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Dosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchSemester() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM semester';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Semester');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchRuangan() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM ruangan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Ruangan');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwal() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT m.kode_mk AS "matkul_kode_mk", m.nama_mk AS "matkul_nama_mk", d.nik AS "dosen_nik", d.nama_dosen AS "dosen_nama_dosen", s.id_semester AS "semester_id_semester", s.nama_tahun_semester AS "semester_nama_tahun_semester", r.id_ruangan AS "ruangan_id_ruangan", r.nama_ruangan AS "ruangan_nama_ruangan", kelas_jadwal, hari_jadwal, waktu_mulai_jadwal, tipe_jadwal FROM jadwal j JOIN matkul m ON j.matkul_kode_mk = m.kode_mk JOIN dosen d ON j.dosen_nik = d.nik JOIN semester s ON j.semester_id_semester = s.id_semester JOIN ruangan r ON j.ruangan_id_ruangan = r.id_ruangan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchAsisten() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM asisten';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Asisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveDetail(Detail $detail)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO detail(pertemuan_ke, tanggal, waktu_mulai, jumlah_mahasiswa, materi, keterangan, dibantu_asisten, bukti, jadwal_kelas_jadwal, jadwal_semester_id_semester, jadwal_dosen_nik, jadwal_matkul_kode_mk, jadwal_tipe_jadwal) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $detail->getPertemuanKe());
        $stmt->bindValue(2, $detail->getTanggal());
        $stmt->bindValue(3, $detail->getWaktuMulai());
        $stmt->bindValue(4, $detail->getJumlahMahasiswa());
        $stmt->bindValue(5, $detail->getMateri());
        $stmt->bindValue(6, $detail->getKeterangan());
        $stmt->bindValue(7, $detail->getDibantuAsisten());
        $stmt->bindValue(8, $detail->getBukti());
        $stmt->bindValue(9, $detail->getJadwal()->getKelasJadwal());
        $stmt->bindValue(10, $detail->getJadwal()->getSemester()->getIdSemester());
        $stmt->bindValue(11, $detail->getJadwal()->getDosen()->getNik());
        $stmt->bindValue(12, $detail->getJadwal()->getMatkul()->getKodeMk());
        $stmt->bindValue(13, $detail->getJadwal()->getTipeJadwal());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function deleteDetail($deletedPertemuan, $deletedKelas, $deletedSemester, $deletedDosen, $deletedMatkul, $deletedTipe) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = ' DELETE FROM detail WHERE pertemuan_ke = ? AND jadwal_kelas_jadwal = ? AND jadwal_semester_id_semester = ? AND jadwal_dosen_nik = ? AND jadwal_matkul_kode_mk = ? AND jadwal_tipe_jadwal = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedPertemuan, PDO::PARAM_STR);
        $stmt->bindParam(2, $deletedKelas, PDO::PARAM_STR);
        $stmt->bindParam(3, $deletedSemester, PDO::PARAM_STR);
        $stmt->bindParam(4, $deletedDosen, PDO::PARAM_STR);
        $stmt->bindParam(5, $deletedMatkul, PDO::PARAM_STR);
        $stmt->bindParam(6, $deletedTipe, PDO::PARAM_STR);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }
}
