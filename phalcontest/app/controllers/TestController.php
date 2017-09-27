<?php 
	use Phalcon\Mvc\Model\Query;
 	use Phalcon\Db\Adapter\Pdo\Mysql;
  use Phalcon\Paginator\Adapter\Model as Paginator;
  use Library\Forms\SearchForm;
   

	
class TestController extends ControllerBase {


   public function indexAction()
    {
        $name = $this->request->get('name');
        
        
        $data = $this->modelsManager->createBuilder()
            ->columns(array(
                'Test.id',
                'Test.student_id',
                'Test.sche_id',          
                'C.name cer_name',
                

            ))
            ->from('Test')
            ->leftjoin('Certificate', 'C.id = Test.cer_id', 'C')
            
            ->where('1=1');
            /*$kt="su dung";
            $data->andWhere('S.name LIKE "%' . $kt . '%"');*/

        //Create array value of request to find in Property
        $array_request = array();
        if ($name) {
            $array_request['name'] = $name;
            $data->andWhere('Test.id LIKE "%' . $name . '%"');
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
    public function deleteAction($code)
    {
        $test = Test::findFirstById($code);

        if (!$test) {
            $this->flash->error("Không tìm thấy đề thi.");

            return $this->dispatcher->forward(array(
                "controller" => "test",
                "action" => "index"
            ));
        }
        $array_questiontest=$test->ResultTest ;
        foreach ($array_questiontest as $row_question)
        {
            $row_question->delete();
        } 
        if (!$test->delete()) {

            foreach ($test->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "test",
                "action" => "search"
            ));
        }

        $this->flashSession->success("Xóa đề thi thành công.");

        return $this->response->redirect('test');
    }

    public function detailAction($code)
    {
        $test = Test::findFirstById($code);

        if (!$test) {
            $this->flash->error("Không tìm thấy đề thi.");

            return $this->dispatcher->forward(array(
                "controller" => "test",
                "action" => "index"
            ));
        }
        $array_questiontest=$test->ResultTest ;
       
        if ($array_questiontest == null) {
            $this->flash->success("Không có dữ liệu.");
        } else {
            $numberPage = $this->request->get('page');

            

            $paginator = new Paginator(array(
                "data" => $array_questiontest,
                "limit" => 10,
                "page" => $numberPage
            ));
            
            $this->view->page = $paginator->getPaginate();
            $this->view->code = $code;
        }
    }

    public function exportexcelAction($code)
    {
        $test = Test::findFirstById($code);
        $data = $test->ResultTest ;
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('test worksheet');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', "Mã")
            ->setCellValue('C1', "Nội dung câu hỏi")
            ->setCellValue('D1', "A")
            ->setCellValue('E1', "B")
            ->setCellValue('F1', "C")
            ->setCellValue('G1', "D")
            ->setCellValue('H1', "Đáp án")
            ->setCellValue('I1', "Url hình ảnh");                     
            
        
    $rowNumber = 2;
    $index=1;
    foreach ($data as $item) 
    {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$rowNumber, ($index ++))
            ->setCellValue('B'.$rowNumber, $item->getQuesId())
            ->setCellValue('C'.$rowNumber, $item->Question->getQuestion())
            ->setCellValue('D'.$rowNumber, $item->getA())
            ->setCellValue('E'.$rowNumber, $item->getB())
            ->setCellValue('F'.$rowNumber, $item->getC())
            ->setCellValue('G'.$rowNumber, $item->getD())
            ->setCellValue('H'.$rowNumber, $item->getCorrectanswer())
            ->setCellValue('I'.$rowNumber, $item->Question->getImage());
           
        
        $rowNumber++;
    }

    // file name to output
    $fname = date("Ymd_his") . ".xlsx";

    // temp file name to save before output
    $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save($temp_file);

    $response = new \Phalcon\Http\Response();

    // Redirect output to a client’s web browser (Excel2007)
    $response->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->setHeader('Content-Disposition', 'attachment;filename="' . $fname . '"');
    $response->setHeader('Cache-Control', 'max-age=0');

    // If you're serving to IE 9, then the following may be needed
    $response->setHeader('Cache-Control', 'max-age=1');

    //Set the content of the response
    $response->setContent(file_get_contents($temp_file));

    // delete temp file
    unlink($temp_file);

    //Return the response
    return $response;
    }
}
