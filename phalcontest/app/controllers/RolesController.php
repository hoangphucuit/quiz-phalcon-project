<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
use Library\Forms\SearchForm;

class RolesController extends ControllerBase
{

	/**
     * Show role list
     *
     * @param 
     */
    public function indexAction()
    {

    	$name = $this->request->get('name');
        $num_rows = Roles::count(array(
            "name LIKE '%$name%'",
            "order" => "code"
        ));
        if ($num_rows == 0) {
            $this->flash->success("Không có dữ liệu.");
        } else {
            $numberPage = $this->request->get('page');

            $data = Roles::find(array(
                "name LIKE '%$name%'",
                "order" => "code"
            ));

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

    /**
     * Delete a role
     *
     * @param string $code
     */
    public function deleteAction($code)
    {
        $roles = Roles::findFirstByCode($code);
        if (!$roles) {
            $this->flash->error("Không tìm thấy vai trò thành viên.");

            return $this->dispatcher->forward(array(
                "controller" => "roles",
                "action" => "index"
            ));
        }

        if (!$roles->delete()) {

            foreach ($Roles->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "roles",
                "action" => "search"
            ));
        }

        $this->flashSession->success("Xóa vai trò thành viên thành công.");

        return $this->response->redirect('roles');
    }

    /**
     * Edit a role
     *
     * @param string $code
     * 
     */
    public function editAction($code)
    {
        $roles = Roles::findFirstByCode($code);
        if ($roles) {
            if ($this->request->isPost()) {
                $roles->name = $this->request->getPost("name");

                if (!$roles->save()) {
                    foreach ($roles->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $this->flashSession->success("Cập nhật thành công");

                    return $this->response->redirect('roles');
                }
            }

            $form = new RolesForm($roles);
            $this->view->form = $form;
        } else {
            $this->flash->error("Không tìm thấy dữ liệu");

            return $this->response->redirect('roles');
        }
    }

    /**
     * Creates a new nhacungcap
     */
    public function addAction()
    {
        $form = new RolesForm();
        
        if ($this->request->isPost()){
            $roles = new Roles();
            $roles->assign(array(
                'name' => $this->request->getPost('name')
            ));

            if (!$roles->save()) {
                foreach ($roles->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                $this->flashSession->success("Tạo vai trò thành viên thành công");
                return $this->response->redirect('roles');
            }
        }
        
            
        $this->view->form = $form;
    }

   

}

