<?php
ob_start();
class MatkulController
{
    private $matkulDao;
    private $prodiDao;

    public function __construct()
    {
        $this->matkulDao = new MatkulDaoImpl();
        $this->prodiDao = new ProdiDaoImpl();
    }

    public function index()
    {
        /* fungsi delete */
        $deleteApproved = filter_input(INPUT_GET, 'delcomMatkul');
        if (isset($deleteApproved) && $deleteApproved == 1) {
            $deletedId = filter_input(INPUT_GET, 'didMatkul');
            $result = $this->matkulDao->deleteMatkul($deletedId);
        }
        $matkul = $this->matkulDao->fetchAllMatkul();
        include_once 'view/matkul-view.php';
    }

    public function addMatkul()
    {
        $buttonPressed = filter_input(INPUT_POST, 'btnAddMatkul');
        if (isset($buttonPressed)) {
            $kodeMatkul= filter_input(INPUT_POST, 'kodeMatkul');
            $namaMatkul= filter_input(INPUT_POST, 'namaMatkul');
            $prodi= filter_input(INPUT_POST, 'prodi');
            $jumlahSks = filter_input(INPUT_POST, 'jumlahSks');

            $trimmedKode = trim($kodeMatkul);
            $trimmedNama = trim($namaMatkul);
            $trimmedProdi = trim($prodi);
            $trimmedJmlhSks= trim($jumlahSks);

            $matkul = new Matkul();
            $matkul->setKodeMk($trimmedKode);
            $matkul->setNamaMk($trimmedNama);
            $matkul->getProdi()->setIdProdi(substr($trimmedProdi, 0, 2));;
            $matkul->setJumlahSks($trimmedJmlhSks);

            $result = $this->matkulDao->saveMatkul($matkul);
        }
        $matkul = $this->matkulDao->fetchAllMatkul();
        include_once 'view/matkul-form-view.php';
    }

    public function updateMatkul(){
        $editedId = filter_input(INPUT_GET,'eidMatkul');
        if(isset($editedId) && $editedId != ''){
            $matkul = $this->matkulDao->fetchMatkulByKode($editedId);
        }
        $buttonPressed = filter_input(INPUT_POST,'btnUpdateMatkul');
        if(isset($buttonPressed)){
            $namaMatkul = filter_input(INPUT_POST,'namaMatkul');
            $prodi = filter_input(INPUT_POST, 'prodi');
            $jumlahSks = filter_input(INPUT_POST,'jumlahSks');

            $updatedMatkul = new Matkul();
            $updatedMatkul->setKodeMk($matkul->getKodeMk());
            $updatedMatkul->setNamaMk($namaMk);
            $updatedMatkul->setJumlahSks($jumlahSks);
            $updatedMatkul->getProdi()->setIdProdi($prodi);
            $result = $this->matkulDao->updateMatkul($updatedMatkul);

            if ($result){
                header('location:index.php?webmenu=matkul');
            }
            else{
                echo '<div class="bg-error">Failed to update</div>';
            }
        }
        $prodi = $this->prodiDao->fetchAllProdi();
        include_once 'view/update-matkul-view.php';
    }
}
