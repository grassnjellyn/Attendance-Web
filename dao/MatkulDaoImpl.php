<?php

class MatkulDaoImpl
{
    public function fetchAllMatkul()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = $query = 'SELECT p.id_prodi, p.nama_prodi AS "prodi_name", m.kode_mk, m.nama_mk, m.prodi_id_prodi, m.jumlah_sks FROM matkul m LEFT OUTER JOIN prodi p ON m.prodi_id_prodi = p.id_prodi';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Matkul');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchMatkulByKode($kode_mk) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM matkul WHERE kode_mk = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $kode_mk);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Matkul');
    }

    public function saveMatkul(Matkul $matkul)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO matkul(kode_mk, nama_mk, prodi_id_prodi, jumlah_sks) VALUES(?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $matkul->getKodeMk());
        $stmt->bindValue(2, $matkul->getNamaMk());
        $stmt->bindValue(3, $matkul->getProdi()->getIdProdi());
        $stmt->bindValue(4, $matkul->getJumlahSks());
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

    public function deleteMatkul($deletedKode) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM matkul WHERE kode_mk = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedKode, PDO::PARAM_STR);
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

    public function updateMatkul(matkul $matkul) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE matkul SET nama_mk = ?, prodi_id_prodi = ?, jumlah_sks = ? WHERE kode_mk = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(4, $matkul->getKodeMk());
        $stmt->bindValue(1, $matkul->getNamaMk());
        $stmt->bindValue(2, $matkul->getProdi()->getIdProdi());
        $stmt->bindValue(3, $matkul->getJumlahSks());
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
