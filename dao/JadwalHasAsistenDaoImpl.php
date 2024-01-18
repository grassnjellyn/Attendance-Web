<?php

class JadwalHasAsistenDaoImpl
{
    public function fetchAllJadwalHasAsisten()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT jadwal_kelas_jadwal, jadwal_tipe_jadwal, a.nrp AS "asisten_nrp", a.nama_mahasiswa AS "asisten_nama_mahasiswa", s.id_semester AS "jadwal_semester_id_semester", s.nama_tahun_semester AS "jadwal_semester_nama_tahun_semester", d.nik AS "jadwal_dosen_nik", d.nama_dosen AS "jadwal_dosen_nama_dosen", m.kode_mk AS "jadwal_matkul_kode_mk", m.nama_mk AS "jadwal_matkul_nama_mk", pertemuan, tanggal, jumlah_jam FROM jadwal_has_asisten jha JOIN asisten a ON jha.asisten_nrp = a.nrp JOIN semester s ON jha.jadwal_semester_id_semester = s.id_semester JOIN dosen d ON jha.jadwal_dosen_nik = d.nik JOIN matkul m ON jha.jadwal_matkul_kode_mk = m.kode_mk';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'JadwalHasAsisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchJadwalHasAsistenByDate($from, $to) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT jadwal_kelas_jadwal, jadwal_tipe_jadwal, a.nrp AS "asisten_nrp", a.nama_mahasiswa AS "asisten_nama_mahasiswa", s.id_semester AS "jadwal_semester_id_semester", s.nama_tahun_semester AS "jadwal_semester_nama_tahun_semester", d.nik AS "jadwal_dosen_nik", d.nama_dosen AS "jadwal_dosen_nama_dosen", m.kode_mk AS "jadwal_matkul_kode_mk", m.nama_mk AS "jadwal_matkul_nama_mk", pertemuan, tanggal, jumlah_jam FROM jadwal_has_asisten jha JOIN asisten a ON jha.asisten_nrp = a.nrp JOIN semester s ON jha.jadwal_semester_id_semester = s.id_semester JOIN dosen d ON jha.jadwal_dosen_nik = d.nik JOIN matkul m ON jha.jadwal_matkul_kode_mk = m.kode_mk WHERE jha.tanggal >= ? AND jha.tanggal <= ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $from);
        $stmt->bindParam(2, $to);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'JadwalHasAsisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveJadwalHasAsisten(JadwalHasAsisten $jadwalHasAsisten)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO jadwal_has_asisten(jadwal_kelas_jadwal, jadwal_semester_id_semester, jadwal_dosen_nik, jadwal_matkul_kode_mk, jadwal_tipe_jadwal, asisten_nrp, pertemuan, tanggal, jumlah_jam) VALUES(?,?,?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $jadwalHasAsisten->getJadwal()->getKelasJadwal());
        $stmt->bindValue(2, $jadwalHasAsisten->getJadwal()->getSemester()->getIdSemester());
        $stmt->bindValue(3, $jadwalHasAsisten->getJadwal()->getDosen()->getNik());
        $stmt->bindValue(4, $jadwalHasAsisten->getJadwal()->getMatkul()->getKodeMk());
        $stmt->bindValue(5, $jadwalHasAsisten->getJadwal()->getTipeJadwal());
        $stmt->bindValue(6, $jadwalHasAsisten->getAsisten()->getNrp());
        $stmt->bindValue(7, $jadwalHasAsisten->getPertemuan());
        $stmt->bindValue(8, $jadwalHasAsisten->getTanggal());
        $stmt->bindValue(9, $jadwalHasAsisten->getJumlahJam());
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
