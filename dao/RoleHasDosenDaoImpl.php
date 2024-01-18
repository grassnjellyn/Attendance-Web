<?php

class RoleHasDosenDaoImpl
{
    public function fetchAllRoleHasDosen()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM role_has_dosen';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'RoleHasDosen');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveRoleHasDosen(RoleHasDosen $roleHasDosen)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO role_has_dosen(role_id_role, dosen_nik) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $roleHasDosen->getRole()->getIdRole());
        $stmt->bindValue(2, $roleHasDosen->getDosen()->getNik());
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