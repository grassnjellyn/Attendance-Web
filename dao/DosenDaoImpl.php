<?php

class DosenDaoImpl
{
    public function fetchAllDosen()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT r.id_role AS "role_id_role", r.name AS "role_name", nik, nama_dosen, email, password FROM dosen d LEFT OUTER JOIN role r ON d.role_id_role = r.id_role';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Dosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchDosenByNik($nik) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM dosen WHERE nik = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $nik);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Dosen');
    }

    public function saveDosen(Dosen $dosen)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO dosen(nik,nama_dosen,email,password,role_id_role) VALUES(?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $dosen->getNik());
        $stmt->bindValue(2, $dosen->getNamaDosen());
        $stmt->bindValue(3, $dosen->getEmail());
        $stmt->bindValue(4, $dosen->getPassword());
        $stmt->bindValue(5, $dosen->getRole()->getIdRole());
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

    public function dosenLogin($nik, $password){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM dosen WHERE nik = ? AND password = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$nik);
        $stmt->bindParam(2,$password);
        $stmt->execute();
        $dosen = $stmt->fetchAll();
        $stmt = null;
        return $dosen;
    }

    public function deleteDosen($deletedId) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM dosen WHERE nik = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedId, PDO::PARAM_STR);
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

    public function updateDosen(dosen $dosen) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE dosen SET nama_dosen = ?, email = ?, role_id_role = ? WHERE nik = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(4, $dosen->getNik());
        $stmt->bindValue(1, $dosen->getNamaDosen());
        $stmt->bindValue(2, $dosen->getEmail());
        $stmt->bindValue(3, $dosen->getRole()->getIdRole());
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
