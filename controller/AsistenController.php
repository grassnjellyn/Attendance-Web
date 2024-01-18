<?php

class AsistenController
{
    private $asistenDao;

    public function __construct()
    {
        $this->asistenDao = new AsistenDaoImpl();
    }

    public function index()
    {
        /* fungsi delete mahasiswa */
        $deleteApproved = filter_input(INPUT_GET, 'delcomMahasiswa');
        if (isset($deleteApproved) && $deleteApproved == 1) {
            $deletedNrp = filter_input(INPUT_GET, 'didMahasiswa');
            $result = $this->asistenDao->deleteAsisten($deletedNrp);
        }
        $asisten = $this->asistenDao->fetchAllAsisten();
        include_once 'view/mahasiswa-view.php';
    }

    public function addAsisten()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnAddMahasiswa');
        if (isset($buttonPressed)) {
            $nrp = filter_input(INPUT_POST, 'nrp', FILTER_SANITIZE_STRING);
            $namaMahasiswa = filter_input(INPUT_POST, 'namaMahasiswa', FILTER_SANITIZE_STRING);

            if (empty($nrp) or empty($namaMahasiswa)) {
                echo '<div class="bg-error">Please fill in the blank!</div>';
            } else {
                $asisten = new Asisten();
                $asisten->setNrp($nrp);
                $asisten->setNamaMahasiswa($namaMahasiswa);
                $result = $this->asistenDao->saveAsisten($asisten);
                if ($result) {
                    echo '<div class="bg-success">New asisten added</div>';
                } else {
                    echo '<div class="bg-error">Failed to added asisten data</div>';
                }
            }
        }
        $asisten = $this->asistenDao->fetchAllAsisten();
        include_once 'view/mahasiswa-form-view.php';
    }

    public function updateAsisten()
    {
        $editedId = filter_input(INPUT_GET, 'eidMahasiswa');
        if (isset($editedId) && $editedId != '') {
            $asisten = $this->asistenDao->fetchAsistenByNrp($editedId);
        }
        $buttonPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($buttonPressed)) {
            $nrp = filter_input(INPUT_POST, 'nrp', FILTER_SANITIZE_STRING);
            $namaMahasiswa = filter_input(INPUT_POST, 'namaMahasiswa', FILTER_SANITIZE_STRING);

            $updatedAsisten = new Asisten();
            $updatedAsisten->setNrp($nrp);
            $updatedAsisten->setNamaMahasiswa($namaMahasiswa);
            $result = $this->asistenDao->updateAsisten($updatedAsisten);
            if ($result) {
                header('location:index.php?webmenu=mahasiswa');
            } else {
                echo '<div class="bg-error">Failed to update</div>';
            }
        }
        include_once 'view/update-mahasiswa-view.php';
    }
}