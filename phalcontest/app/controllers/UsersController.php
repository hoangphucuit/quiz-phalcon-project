<?php

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

class UsersController extends ControllerBase
{
      

    public function indexAction()
    {

    	$name = $this->request->get('name');
        $mail = $this->request->get('mail');

        //Create array value of request to find in User
        $data = $this->modelsManager->createBuilder()
            ->columns(array(
                'Users.id id',
                'Users.username username',
                'Users.name fullname',
                'Users.mail mail',
                'Users.status status',
                'R.name role'
            ))
            ->from('Users')
            ->leftjoin('Roles', 'R.code = Users.role', 'R')
            ->where('1=1');

        //Create array value of request to find in User
        $array_request = array();
        if ($name) {
            $array_request['name'] = $name;
            $data->andWhere('Users.name LIKE "%' . $name . '%"');
        }
        if ($mail) {
            $array_request['mail'] = $mail;
            $data->andWhere('Users.mail LIKE "%' . $mail . '%"');
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
            'mail' => $mail
        ));
        $this->view->form = $form;
    }

    /*
     * Create user
     */
    public function addAction()
    {
        $form = new CreateUserForm();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {

                $user = new Users();

                $user->assign(array(
                    'id' => $this->request->getPost('id'),
                    'username' => $this->request->getPost('username'),
                    'name' => $this->request->getPost('name'),
                    'phone' => $this->request->getPost('phone'),
                    'mail' => $this->request->getPost('mail'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'role' => $this->request->getPost('role'),
                    'status' => $this->request->getPost('status'),
                    'date_create' => date("Y-m-d H:i:s"),
                    
                ));
                $form = new  CreateUserForm($user);
                $kt = Users::findFirstByUsername($user->getUsername());
                if(!$kt){
                    if (!$user->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    } else {
                            $this->flash->success("Thêm user thành công");

                            return $this->response->redirect('users');
                    }

                }else{$this->flashSession->success("Username đã tốn tại");

                            }

                
            }
        }

        $this->view->form = $form;
    }


    /**
     * Edit User
     *
     *
     * */
    public function editAction($id=null)
    {
        $user = Users::findFirstById($id);

        if ($user) {
            if ($this->request->isPost()) {
                
                $user->name = $this->request->getPost('name');
                $user->role = $this->request->getPost('role');
                $user->phone = $this->request->getPost('phone');
                $user->mail = $this->request->getPost('mail');
                $user->status = $this->request->getPost('status');

                if (!$user->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                } else {
                    $this->flashSession->success("Cập nhật thành công");

                    return $this->response->redirect('users');
                }
            }

            //Default password to empty
            $user->password = "";
            $form = new CreateUserForm($user);
            $this->view->form = $form;
        } else {
            $this->flash->error("Không tìm thấy dữ liệu");

            return $this->response->redirect('users');
        }
    }

    /**
     * Change pasword for Ajax
     *
     * */

    public function changepasswordAction()
    {
        
        $this->view->disable();
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $newpassword = $this->request->getPost('newpassword');

            $user = Users::findFirstByUsername($username);
            if (!$user) {
                echo "1"; //User isn't exist 
            } else {

                $user->password = $this->security->hash($newpassword);

                if (!$user->update()) {
                    echo "2"; //Updated fail
                } else {
                    // Common::recordHistories($this->auth->getName(), $this->dispatcher->getControllerName(), $this->dispatcher->getActionName(), $user, $this->auth->get('affiliate'));
                    echo "3"; //OK
                }
            }
        } else {
            echo "0"; //Error
        }
    }

    /**
     * Deletes a User
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        
        $user = Users::findFirst(array(
            "conditions" => "id = :id:",
            "bind" => array("id" => $id)
        ));
        
        if (!$user) {
            $this->flash->error("Không tìm thấy tài khoản");

            return $this->response->redirect('users');
        }

        if (!$user->delete()) {

            foreach ($username->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->response->redirect('users');
        }

        // Common::recordHistories($this->auth->getName(), $this->dispatcher->getControllerName(), $this->dispatcher->getActionName(), $user, $this->auth->get('affiliate'));

        $this->flash->success("Xóa tài khoản thành công");

        return $this->response->redirect('users');
    }


    /**
     * Delete multi User
     *
     * @param string $id_multi
     * */
    public function deleteMultiCheckAction($id_multi)
    {

        if (strcmp($id_multi, "") == 0) {
            $this->flash->error("Xóa không thành công.");

            return $this->dispatcher->forward(array(
                "controller" => "items",
                "action" => "index"
            ));
        }

        $id_array = explode(",", $id_multi);
        $id_array_error = array();

        
        foreach ($id_array as $item => $value) {
            $items = Users::findFirst(array(
                "conditions" => "id = :id:",
                "bind" => array("id" => $value)
            ));

            if (!$items) {
                $id_array_error[] = $value;
            } else {
                if (!$items->delete()) {
                    $id_array_error[] = $value;
                } else {
                    // Common::recordHistories($this->auth->getName(), $this->dispatcher->getControllerName(), $this->dispatcher->getActionName(), $items, $this->auth->get('affiliate'));
                }
            }
        }

        if (count($id_array_error) != 0) {
            $id_array_error = implode(",", $id_array_error);
            $this->flash->error("Xóa không thành công: " . $id_array_error);
        } else {
            $this->flash->success("Xóa thành công.");
        }

        return $this->response->redirect('users');
    }

    public function importexcelAction(){
      $csvFile = 'user.xlsx';
      $arraydata = readExcelCSV($csvFile);
      
      foreach ($arraydata as $row)
    {
     /* var_dump($row);*/
        if($row[0]!=null){
            $passwd=$this->security->hash($row[3]);
          $success=$this->db->execute("INSERT INTO users (id, name, username, password, mail, phone, role)
                            VALUES ('$row[0]','$row[1]','$row[2]','$passwd','$row[4]','$row[5]','$row[6]')");
                         
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

