<?php

class RuanganDaoImpl
{
    public function fetchAllRuangan()
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM ruangan';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Ruangan');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function saveRuangan(Ruangan $ruangan)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO ruangan(id_ruangan,nama_ruangan) VALUES(?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ruangan->getIdRuangan());
        $stmt->bindValue(2, $ruangan->getNamaRuangan());
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
