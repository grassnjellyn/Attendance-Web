<?php
ob_start();
class SemesterController
{
    private $semesterDao;

    public function __construct()
    {
        $this->semesterDao = new SemesterDaoImpl();
    }
    public function index()
    { /* fungsi delete semester */
        $deleteApproved = filter_input(INPUT_GET, 'delcom');
        // var_dump($deleteApproved);
        if(isset($deleteApproved)&&$deleteApproved==1){
            $deletedId = filter_input(INPUT_GET,'did');
            $result = $this->semesterDao->deleteSemester($deletedId);
        }
        $semester = $this->semesterDao->fetchAllSemester();
        include_once 'view/semester-view.php';
    }

     public function addSemester(){
         $buttonPressed = filter_input(INPUT_POST,'btnAddSemester');
         if(isset($buttonPressed)){
            //  var_dump("test");
             $idSemester = filter_input(INPUT_POST,'idSemester');
             $namaTahunSemester = filter_input(INPUT_POST,'namaTahunSemester');

             $trimmedId = trim($idSemester);
             $trimmedNama = trim($namaTahunSemester);

             $semester = new Semester();
             $semester->setIdSemester($trimmedId);
             $semester->setNamaTahunSemester($trimmedNama);

             $result = $this->semesterDao->saveSemester($semester);
         }
         include_once 'view/semester-form-view.php';
     }

     public function updateIndexSemester(){
        $editedId = filter_input(INPUT_GET,'eidSemester');
        if(isset($editedId) && $editedId != ''){
            $semester = $this->semesterDao->fetchSemesterById($editedId);
        }
        $buttonPressed = filter_input(INPUT_POST,'btnSubmit');
        if(isset($buttonPressed)){
            $namaTahunSemester = filter_input(INPUT_POST,'namaTahunSemester');
           
            $updatedSemester = new Semester();
            $updatedSemester->setIdSemester($semester->getIdSemester());
            $updatedSemester->setNamaTahunSemester($namaTahunSemester);
            
    
            $result = $this->semesterDao->updateSemester($updatedSemester);
                if ($result){
                    header('location:index.php?webmenu=semester');
                }
                else{
                    echo '<div class="bg-error">Failed to update</div>';
                }
    
            }
      
            include_once 'view/update-semester-view.php';
        }
}