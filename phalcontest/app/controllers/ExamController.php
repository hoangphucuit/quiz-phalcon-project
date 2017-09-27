<?php 
	use Phalcon\Mvc\Model\Query;
 	use Phalcon\Db\Adapter\Pdo\Mysql;
   
class ExamController extends ControllerBase {


    public function indexAction(){ 		
       
         
    }

    public function testAction(){

      

      $stu_id=$_SESSION['id'];
      $score=Score::findFirstByStudentId($stu_id);
      $point=$score->getTheoryScore();
      if($stu_id!=null && $score!=null && $point==null){
        
        $test=$score->getTestId();
        $schedule=$score->getScheID();
/*        $test= Test::findFirstByStudentId($stu_id);
*/      if ($test== null && $schedule!=null ) {
        $a=new Test();
        $test=$a->layde_random($schedule);
        $score->test_id=$test->getId();
        $score->save();
        $test->student_id=$stu_id;
        $test->save();
        /*$test->update();*/
       
       
      }else if($test!=null){$test= Test::findFirstByStudentId($stu_id);}
      else{
            $this->flashSession->success("* Bạn không có quyền tham gia kỳ thi này");
            return $this->response->redirect('exam');
          }
      $cauhois=$test->ResultTest ;
      $cathi=$test->Schedule;
      $thoiluong=$cathi->getTime();
      $thoigian=$cathi->getDatetime();

      $thoigiankt = date("Y-m-d H:i:s", strtotime($thoigian . '+'. $thoiluong . 'minutes'));
  
      $now=Date("Y-m-d H:i:s");

      $thoiluongthat = (strtotime($thoigiankt) - strtotime($now))/60;
      
      /*//$now2=date("2016-12-14 22:00:00");
      print_r($thoigian);
      print_r($now);
      die();*/
      
      if( $now>=$thoigian && $now<$thoigiankt){
        $this->view->setVar("mangcauhoi", $cauhois);
        $this->view->setVar("thoiluongthi", $thoiluongthat);
        $this->view->setVar("tongcauhoi", count($cauhois));
        
      }else {
              $this->flashSession->success("Không trong khung thời gian làm bài. Vui lòng quay lại sau !!!");
              return $this->response->redirect('exam');
            }
      
      }else{ 
              $this->flashSession->success("** Bạn không có quyền tham gia kỳ thi này");
              return $this->response->redirect('exam');
            }
      
     


    }

     
    public function markAction(){
    	
      if ($this->request->isPost()){

        $stu_id=$_SESSION['id'];
        $test=Test::findFirstByStudentId($stu_id);
        $arr_id = array();
        $arr_user=array();
        /*var_dump($_POST);
        die();*/
        foreach ($_POST as $key => $value){
                          if($value!=null)
                           {  //echo $key;
          
                            array_push($arr_id, "$key");
                            array_push($arr_user, "$value");
                            }
        } 
        $scheid=$test->getScheId();
        $schedule=Schedule::findFirstById($scheid);
        $numberquestion=$schedule->getNumquestion();
        $diem=0;
        $countid=count($arr_id);
        $cau_bo=$numberquestion-$countid;
        for($i=0;$i<$countid;$i++){
          $id=$arr_id[$i] ;
          
          $cauhoiid=ResultTest::findFirstById($id);
          $correctanswer=$cauhoiid->getCorrectanswer();
          //luu cau tra loi cua thi sinh
          $cauhoiid->answer=$arr_user[$i];
          $cauhoiid->save();
          //
          $user=$arr_user[$i]; 
          $kq=0;
          if($user==$correctanswer){ $kq=1;}
           $diem=$diem + $kq; 
        }
        $savescore=Score::findFirstByStudentId($stu_id);
        $savescore->theory_score=$diem;
        $savescore->save();
            $this->view->setVar("numberquestion", $numberquestion);
            $this->view->setVar("countid", $countid);
            $this->view->setVar("diem", $diem);
            $this->view->setVar("cau_bo", $cau_bo);
      }else{
      $this->flashSession->success("Bạn không được phép truy cập nửa!!!");
      return $this->response->redirect('exam');}

	   }  
    
//test cookie
    public function cookieAction(){
      $a=2;
       $this->cookies->set(
            "remember",
            $a,
            time() + 15 * 86400
        );

       if ($this->cookies->has("remember")) {
            // Get the cookie
            $rememberMeCookie = $this->cookies->get("remember");

            // Get the cookie's value
            $value = $rememberMeCookie->getValue();
            print_r($value);
            die();
            $this->view->setVar("remember", $value);
        }

    }

    public function saveAction(){
      
      $this->view->disable();
        if ($this->request->isPost()) {
            $arr_ques = $this->request->getPost('arr_ques');
            $arr_ans = $this->request->getPost('arr_ans');
            
            $count=count($arr_ques);
            for($i=0;$i<$count;$i++){
                  $id=$arr_ques[$i] ;
                  
                  $cauhoiid=ResultTest::findFirstById($id);
                  //luu cau tra loi cua thi sinh
                  $cauhoiid->answer=$arr_ans[$i];
                  $cauhoiid->save();
                  //
            }
            echo $count;
        }    
    }


}
