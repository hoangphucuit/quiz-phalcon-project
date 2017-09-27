<?php


use Phalcon\Paginator\Adapter\Model as Paginator;
use Library\Forms\SearchForm;
class ScheduleController extends ControllerBase
{
    public function indexAction()
    {
    	
        
        $name = $this->request->get('name');
        $barcode = $this->request->get('code');
        
        $data = $this->modelsManager->createBuilder()
            ->columns(array(
                'Schedule.id',
                'Schedule.name',
                'Schedule.datetime',
                'Schedule.time',
                'Schedule.numquestion',
                'Schedule.nummodule1',
                'Schedule.nummodule2',
                'Schedule.nummodule3',
                'Schedule.nummodule4',
                'Schedule.nummodule5',
                'Schedule.nummodule6',
                'Schedule.nummodule7',
                'Schedule.nummodule8',
                'Schedule.nummodule9',
                'C.name cer_name',
                

            ))
            ->from('Schedule')
            ->leftjoin('Certificate', 'C.id = Schedule.cer_id', 'C')
            
            ->where('1=1');
            /*$kt="su dung";
            $data->andWhere('S.name LIKE "%' . $kt . '%"');*/

        //Create array value of request to find in Property
        $array_request = array();
        if ($name) {
            $array_request['name'] = $name;
            $data->andWhere('Schedule.name LIKE "%' . $name . '%"');
        }
        if ($barcode) {
            $array_request['barcode'] = $barcode;
            $data->andWhere('Schedule.id LIKE "%' . $barcode . '%"');
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
            'code' => $barcode,
            
        ));
        $this->view->form = $form;


	}
    public function addAction()
    {
        $form = new ScheduleForm();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {

                $schedule = new Schedule();
                $loaide=$this->request->getPost('cer_id');
                if($loaide=="CB"){
                    $num1=$this->request->getPost('nummodule1');
                    $num2=$this->request->getPost('nummodule2');
                    $num3=$this->request->getPost('nummodule3');
                    $num4=$this->request->getPost('nummodule4');
                    $num5=$this->request->getPost('nummodule5');
                    $num6=$this->request->getPost('nummodule6');
                    $num7=0;
                    $num8=0;
                    $num9=0;
                }else 
                    if($loaide=="NC"){
                        $num1=0;
                        $num2=0;
                        $num3=0;
                        $num4=0;
                        $num5=0;
                        $num6=0;
                        $num7=$this->request->getPost('nummodule7');
                        $num8=$this->request->getPost('nummodule8');
                        $num9=$this->request->getPost('nummodule9');
                    }

                $date=$this->request->getPost('date');
                $time_start=$this->request->getPost('time_start');
                $schedule->assign(array(
                    'id' => $this->request->getPost('id'),
                    'name' => $this->request->getPost('name'),
                    'datetime' => $date.' '. $time_start,
                    'time' => $this->request->getPost('time'),
                    'cer_id' => $this->request->getPost('cer_id'),
                    'numquestion' => $this->request->getPost('numquestion'),
                    'nummodule1' => $num1,
                    'nummodule2' => $num2,
                    'nummodule3' => $num3,
                    'nummodule4' => $num4,
                    'nummodule5' => $num5,
                    'nummodule6' => $num6,
                    'nummodule7' => $num7,
                    'nummodule8' => $num8,
                    'nummodule9' => $num9,

                    
                    
                ));
                $form = new  ScheduleForm($schedule);


                if (!$schedule->save()) {
                    foreach ($schedule->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $this->flashSession->success("Thêm lịch thi thành công");

                    return $this->response->redirect('schedule');
                }
            }
        }

        $this->view->form = $form;
    }
     public function deleteAction($code)
    {
       $schedule = Schedule::findFirstById($code);
        if (!$schedule) {
            $this->flash->error("Không tìm thấy khóa thi.");

            return $this->dispatcher->forward(array(
                "controller" => "schedule",
                "action" => "index"
            ));
        }

        if (!$schedule->delete()) {

            foreach ($schedule->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "schedule",
                "action" => "search"
            ));
        }

        $this->flashSession->success("Xóa khóa thi thành công.");

        return $this->response->redirect('schedule');
    }

    public function editAction($code)
    {
         $schedule = Schedule::findFirstById($code);
         
        if ($schedule) {
            if ($this->request->isPost()) {
                
                $schedule->name = $this->request->getPost('name');
                $schedule->datetime = $this->request->getPost('datetime');
                $schedule->time = $this->request->getPost('time');
                

                if (!$schedule->save()) {
                    foreach ($schedule->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                } else {
                    $this->flashSession->success("Cập nhật thành công");

                    return $this->response->redirect('schedule');
                }
            }
            $form = new EdittimescheduleForm($schedule);
            $this->view->form = $form;
        } else {
            $this->flash->error("Không tìm thấy dữ liệu");

            return $this->response->redirect('schedule');
        }

        

    }
   

}

