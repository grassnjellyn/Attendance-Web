<?php

class AsistenDaoImpl
{
    public function fetchAllAsisten()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM asisten';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Asisten');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchAsistenByNrp($id) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM asisten WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Asisten');
    }

    public function saveAsisten(Asisten $asisten)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO asisten(nrp, nama_mahasiswa) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $asisten->getNrp());
        $stmt->bindValue(2, $asisten->getNamaMahasiswa());
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

    public function deleteAsisten($deletedNrp) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM asisten WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedNrp, PDO::PARAM_INT);
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

    public function updateAsisten(asisten $asisten) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE asisten SET nama_mahasiswa = ? WHERE nrp = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $asisten->getNamaMahasiswa());
        $stmt->bindValue(2, $asisten->getNrp());
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
