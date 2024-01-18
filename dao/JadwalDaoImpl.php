<?php

class JadwalDaoImpl
{
    public function fetchAllJadwal()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT m.kode_mk AS "matkul_kode_mk", m.nama_mk AS "matkul_nama_mk", d.nik AS "dosen_nik", d.nama_dosen AS "dosen_nama_dosen", s.id_semester AS "semester_id_semester", s.nama_tahun_semester AS "semester_nama_tahun_semester", r.id_ruangan AS "ruangan_id_ruangan", r.nama_ruangan AS "ruangan_nama_ruangan", kelas_jadwal, hari_jadwal, waktu_mulai_jadwal, tipe_jadwal FROM jadwal j JOIN matkul m ON j.matkul_kode_mk = m.kode_mk JOIN dosen d ON j.dosen_nik = d.nik JOIN semester s ON j.semester_id_semester = s.id_semester JOIN ruangan r ON j.ruangan_id_ruangan = r.id_ruangan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jadwal');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveJadwal(Jadwal $jadwal)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO jadwal(kelas_jadwal, hari_jadwal, waktu_mulai_jadwal, matkul_kode_mk, dosen_nik, semester_id_semester, ruangan_id_ruangan, tipe_jadwal) VALUES(?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwal->getKelasJadwal());
        $stmt->bindValue(2, $jadwal->getHariJadwal());
        $stmt->bindValue(3, $jadwal->getWaktuMulaiJadwal());
        $stmt->bindValue(4, $jadwal->getMatkul()->getKodeMk());
        $stmt->bindValue(5, $jadwal->getDosen()->getNik());
        $stmt->bindValue(6, $jadwal->getSemester()->getIdSemester());
        $stmt->bindValue(7, $jadwal->getRuangan()->getIdRuangan());
        $stmt->bindValue(8, $jadwal->getTipeJadwal());
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

    public function deleteJadwal($deletedKelas, $deletedMatkul, $deletedDosen, $deletedSemester, $deletedTipe) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = ' DELETE FROM jadwal WHERE kelas_jadwal = ? AND matkul_kode_mk = ? AND dosen_nik = ? AND semester_id_semester = ? AND tipe_jadwal = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedKelas, PDO::PARAM_STR);
        $stmt->bindParam(2, $deletedMatkul, PDO::PARAM_STR);
        $stmt->bindParam(3, $deletedDosen, PDO::PARAM_STR);
        $stmt->bindParam(4, $deletedSemester, PDO::PARAM_STR);
        $stmt->bindParam(5, $deletedTipe, PDO::PARAM_STR);
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
