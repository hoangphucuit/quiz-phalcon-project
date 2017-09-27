<?php 
	use Phalcon\Mvc\Model\Query;
 	use Phalcon\Db\Adapter\Pdo\Mysql;
  use Phalcon\Paginator\Adapter\Model as Paginator;
  use Library\Forms\SearchForm;
   function readExcelCSV($csvFile)
	{
      	$objPHPExcel = new PHPExcel();
  		$inputFileType = PHPExcel_IOFactory::identify($csvFile);
	    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	     
	    $objReader->setReadDataOnly(true);
	     
	    /**  Load $inputFileName to a PHPExcel Object  **/
	    $objPHPExcel = $objReader->load("$csvFile");
	     
	    $total_sheets=$objPHPExcel->getSheetCount();
	     
	    $allSheetName=$objPHPExcel->getSheetNames();
	    $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
	    $highestRow    = $objWorksheet->getHighestRow();
	    $highestColumn = $objWorksheet->getHighestColumn();
	    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	    $arraydata = array();
   		for ($row = 1; $row <= $highestRow;++$row)
    	{
        	for ($col = 0; $col <$highestColumnIndex;++$col)
        	{
            	$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            	$arraydata[$row-1][$col]=$value;
        	}
    	}
    	return $arraydata;
	}

	
class ScoreController extends ControllerBase {


    public function indexAction(){ 	
       
        
          $name = $this->request->get('name');
        
        $data = $this->modelsManager->createBuilder()
            ->columns(array(
                'Score.id',
                'Score.student_id',
                'U.name student_name',
                'Score.test_id',
                'Score.sche_id',
               'S.name sche_name',
                'Score.theory_score',
                'Score.practice_score',

            ))
            ->from('Score')
            ->leftjoin('Users', 'U.id = Score.student_id', 'U')
            ->leftjoin('Schedule','S.id = Score.sche_id','S')
            ->where('1=1');
        $array_request = array();
        if ($name) {
            $array_request['name'] = $name;
            $data->andWhere('Score.student_id LIKE "%' . $name . '%"');
        }
       
         $data = $data->getQuery()->execute();

        if ($data->count() == 0) {
            $this->flash->success("Không có dữ liệu.");
        } else {
            $numberPage = $this->request->get('page');

            $paginator = new Paginator(array(
                "data" => $data,
                "limit" => 10,
                "page" => $numberPage
            ));

            $this->view->page = $paginator->getPaginate();
        }
        $form = new SearchForm((object)array(
            'name' => $name,
            
            
        ));
        $this->view->form = $form;
       
       
         
    }
     
    public function addAction(){
      $form = new ScoreForm();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {

                $score = new Score();

                $score->assign(array(
                    'student_id' => $this->request->getPost('student_id'),
                    'sche_id' => $this->request->getPost('sche_id'),
                    
                ));
                $form = new  ScoreForm($score);
                $kt = Score::findFirstByStudentId($score->getStudentId());
                if(!$kt){
                    if (!$score->save()) {
                    foreach ($score->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    } else {
                            $this->flash->success("Thêm thành công");

                            return $this->response->redirect('score');
                    }

                }else{$this->flashSession->success("Sinh viên đã tốn tại trong kỳ thi");

                            }

                
            }
        }

        $this->view->form = $form;


    }

    public function importexcelAction(){
      $csvFile = 'score.xlsx';
      $arraydata = readExcelCSV($csvFile);
      
      foreach ($arraydata as $row)
    {
     /* var_dump($row);*/
        if($row[0]!=null){
          $success=$this->db->execute("INSERT INTO score (student_id,sche_id)
                            VALUES ('$row[0]','$row[1]')");
                         
          if($success)echo "Success!!";
          else echo "Failed!!";
        }
        
    }
                   
    } 

    public function uploadAction(){
      
      if (isset($_POST['uploadclick'])){
     // Check if the user has uploaded files
      if ($this->request->hasFiles() == true) {
        // Print the real file names and their sizes
        foreach ($this->request->getUploadedFiles() as $file) {
            echo $file->getName(), " ", $file->getSize(), "\n";
            $file->moveTo('' . $file->getName());
            if($file->getName() == null){$this->flash->success("Tải lên thất bại");break;}
            $this->flash->success("Tải lên thành công");
        }
      } else {$this->flash->success("Tải lên thất bại");
        }
      }
    }


}
