<?php 
	use Phalcon\Mvc\Model\Query;
 	use Phalcon\Db\Adapter\Pdo\Mysql;
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

	function savetest($tests,$de)
	{
		if($tests!=null){
			
                
		 	foreach($tests as $rowquestion) {
        
        $array_answer=array("A" => $rowquestion->getAnswer1(),"B" => $rowquestion->getAnswer2(),"C" => $rowquestion->getAnswer3(),"D" => $rowquestion->getAnswer4());
        $array_shuffle=array("A" => $rowquestion->getAnswer1(),"B" => $rowquestion->getAnswer2(),"C" => $rowquestion->getAnswer3(),"D" => $rowquestion->getAnswer4());
        $array_ABCD=array("0" =>"A","1" => "B","2"=> "C","3"=>"D");
        shuffle($array_shuffle);
        $correct_answer=$rowquestion->getCorrectanswer();
      
        $string_correct_answer=$array_answer[$correct_answer];
      
        foreach ($array_shuffle as $key => $value) {
          if($value == $string_correct_answer){$lastcorrect=$array_ABCD[$key];} 
        }
	     		$luu=new ResultTest();
          		$luu->assign(array(
                   
                    'test_id' => $de->getId(),
                    'cer_id' => $rowquestion->Module->getTypeCer(),
                    'ques_id' => $rowquestion->getId(),
                    'A' => $array_shuffle['0'],
                    'B' => $array_shuffle['1'],
                    'C' => $array_shuffle['2'],
                    'D' => $array_shuffle['3'],
                
                    'correctanswer' => $lastcorrect,
                    
                    
                ));
          		$luu->save();
          		
         
         	}
		}
		
	}
class DethiController extends ControllerBase {


    public function indexAction(){ 		
      
        $a= new Question();
        $socau=10;
        $b= $a->laysocauhoingaunhien($socau);
       
			//testketquadatabase
      /*
      $cauhois = Question::find();
      foreach ($cauhois as $cauhoi) {
  			 echo $cauhoi->getId();
  			 echo $cauhoi->getQuestion();
			}*/
      /*foreach($b as $rowquestion) {
	     		$luu=new ResultTest();
          $de= new Test();
          $de->assign(array(
                    'id' => $_SESSION['id'],
                    'cer_id' => 'CB',
          ));
          $de->save();
          $luu->assign(array(
                    
                    'student_id' => $_SESSION['id'],
                    'test_id' => $_SESSION['id'],
                    'cer_id' => $rowquestion->Module->getTypeCer(),
                    'ques_id' => $rowquestion->getId(),
                    'A' => $rowquestion->getAnswer1(),
                    'B' => $rowquestion->getAnswer2(),
                    'C' => $rowquestion->getAnswer3(),
                    'D' => $rowquestion->getAnswer4(),
                    'answer' => "none",
                    'correctanswer' => $rowquestion->getCorrectanswer(),
                    
                    
                ));
          $luu->save();
         
          }*/
		$this->view->setVar("mangcauhoi", $b);
         
    }
     
    public function markAction(){
    	//---cach get theo doi tuong -----
    	//$request = new Request();
    	//$u = $request->getPost();
    	//print_r($u);
     
    	$arr_id = array();
  		$arr_user=array();
		  
  		foreach ($_POST as $key => $value){
   											if($value!=null)
   											 {	//echo $key;
        
   												array_push($arr_id, "$key");
   												array_push($arr_user, "$value");
                          }
			}	
      
		$diem=0;
 		$countid=count($arr_id);
		$cau_bo=10-$countid;
		for($i=0;$i<$countid;$i++){
	  		$id=$arr_id[$i] ;
		  	$cauhoiid=new Question();
        $cauhoiid=$cauhoiid->laycauhoitheoid($id);
	 	  	$answer=$cauhoiid->getCorrectanswer();
        
		  	$user=$arr_user[$i]; 
        $kq=0;
        if($user==$answer){ $kq=1;}
      	 $diem=$diem + $kq; 
    	}
    			$this->view->setVar("countid", $countid);
    			$this->view->setVar("diem", $diem);
    			$this->view->setVar("cau_bo", $cau_bo);

	}

    public function labAction(){
        
        $lab= new Lab();
        $socau=2;
        $b= $lab->laysocauhoi_random($socau);
     
          
    $this->view->setVar("manglab", $b);
         
    }

   

    public function importexcelAction(){
      $csvFile = 'question.xlsx';
      $arraydata = readExcelCSV($csvFile);
      
      foreach ($arraydata as $row)
    {
     /* var_dump($row);*/
        if($row[0]!=null){
          $success=$this->db->execute("INSERT INTO question
                            VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]', '$row[7]', '$row[8]')");
                         
          if($success)echo "Success!!";
          else echo "Failed!!";
        }
        
    }
                        /*foreach ($arraydata as $array) {
                            $string = '';
                            foreach ($array as $key => $value) {
                                if($key==count($array)-1)
                                    $string = $string.$value;
                                else
                                    $string = $string.$value.',';
                            }
                            echo $string . "\xA";
                        }*/

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

    public function maketestAction(){
      
     
      $form=new MaketestForm();
     

    	if ($this->request->isPost()) {
            // Get the data from the user

            $numtest    = $this->request->getPost("numtest");
            $schedule_id=$this->request->getPost("schedule_id");
            
            $schedule=Schedule::findFirstById($schedule_id);
            
            
            if($numtest==null || $numtest <=0 ){$numtest=0;}
            for ($x = 1; $x <= $numtest; $x++) {
            	$a= new Question();
        		$socau=$schedule->getNumquestion();
            if($schedule->getCerId()=="CB"){
              
              $de= new Test();
              $de->assign(array(
                    
                    'cer_id' => 'CB',
                    'student_id'=> "",
                    'sche_id'=>$schedule_id,
              ));
              $de->save();
              if (!$de->save()) {
                    
                        $this->flashSession->error("Đã xãy ra lỗi trong quá trình tạo đề");
                    
              }
              $num[0]=$schedule->getNummodule1();
              $num[1]=$schedule->getNummodule2();
              $num[2]=$schedule->getNummodule3();
              $num[3]=$schedule->getNummodule4();
              $num[4]=$schedule->getNummodule5();
              $num[5]=$schedule->getNummodule6();
              
              $module=Module::find();
              $modul=$module->toArray();
              
              for($i=0;$i<6;$i++){
                                $a=$num[$i];
                                $b=$modul[$i]['code'];
                                if($a!=0){
                                $q=new Question();
                                $q=$q->laysocauhoi_random($a,$b);
                                savetest($q,$de);
                                
                                }
              } 


            }else if($schedule->getCerId()=="NC"){
                        $de= new Test();
                        $de->assign(array(
                    
                              'cer_id' => 'NC',
                              'student_id'=> "",
                              'sche_id'=>$schedule_id,
                        ));
                        $de->save();
                        if (!$de->save()) {
                    
                                $this->flashSession->error("Đã xãy ra lỗi trong quá trình tạo đề");
                    
                        }
                        $num[6]=$schedule->getNummodule7();
                        $num[7]=$schedule->getNummodule8();
                        $num[8]=$schedule->getNummodule9();
                        
                        
                        $module=Module::find();
                        $modul=$module->toArray();
                        
                        for($i=6;$i<9;$i++){
                                          $a=$num[$i];
                                          $b=$modul[$i]['code'];
                                          if($a!=0){
                                          $q=new Question();
                                          $q=$q->laysocauhoi_random($a,$b);
                                          savetest($q,$de);
                                          
                                          }
                        } 

            }
        		
			}   
            $this->flash->success('Xuất thành công ' .  $numtest  . ' đề thi');

            /*return $this->response->redirect('dethi');*/
        }
            
        $this->view->form = $form;
        
    }

}
