<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
use Library\Forms\SearchForm;

class ModuleController extends ControllerBase
{

	/**
     * Show module
     *
     * @param 
     */
    public function indexAction()
    {

    	$name = $this->request->get('name');
        $num_rows = Module::count(array(
            "name LIKE '%$name%'",
            "order" => "code"
        ));
        if ($num_rows == 0) {
            $this->flash->success("Không có dữ liệu.");
        } else {
            $numberPage = $this->request->get('page');

            $data = Module::find(array(
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
     * Delete a module
     *
     * @param string $code
     */
    public function deleteAction($code)
    {
        $module = Module::findFirstByCode($code);
        if (!$module) {
            $this->flash->error("Không tìm thấy module.");

            return $this->dispatcher->forward(array(
                "controller" => "module",
                "action" => "index"
            ));
        }

        if (!$module->delete()) {

            foreach ($module->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "module",
                "action" => "search"
            ));
        }

        $this->flashSession->success("Xóa module thành công.");

        return $this->response->redirect('module');
    }

    /**
     * Edit a role
     *
     * @param string $code
     * 
     */
    public function editAction($code)
    {
        $module = Module::findFirstByCode($code);
        if ($module) {
            if ($this->request->isPost()) {
                $module->name = $this->request->getPost("name");
                $module->type_cer = $this->request->getPost("type_cer");

                if (!$module->save()) {
                    foreach ($module->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $this->flashSession->success("Cập nhật thành công");

                    return $this->response->redirect('module');
                }
            }

            $form = new ModuleForm($module);
            $this->view->form = $form;
        } else {
            $this->flash->error("Không tìm thấy dữ liệu");

            return $this->response->redirect('module');
        }
    }

    /**
     * Creates a new nhacungcap
     */
    public function addAction()
    {
        $form = new ModuleForm();
        
        if ($this->request->isPost()){
            $module = new Module();
            $module->assign(array(
                'name' => $this->request->getPost('name'),
                'type_cer' => $this->request->getPost('type_cer'),
                'code' => $this->request->getPost('code'),
            ));

            if (!$module->save()) {
                foreach ($module->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                $this->flashSession->success("Tạo module thành công");
                return $this->response->redirect('module');
            }
        }
        
            
        $this->view->form = $form;
    }

   

}

