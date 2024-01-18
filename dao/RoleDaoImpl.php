<?php

class RoleDaoImpl
{
    public function fetchAllRole()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM role';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Role');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveRole(Role $role)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO role(id_role, name) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $role->getIdRole());
        $stmt->bindValue(2, $role->getName());
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