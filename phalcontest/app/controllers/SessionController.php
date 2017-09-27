<?php

class SessionController extends \Phalcon\Mvc\Controller
{
    
    public function indexAction()
    {
        $this->view->setMainView("");
        
       

    }
    public function loginAction(){
        if ($this->session->has("user")) { 
            $this->response->redirect("users");
            
         // Logged in
        } else {

                $this->view->setMainView("");
        } 
    }
    public function startAction()
    {
        if ($this->request->isPost()) {

            // Get the data from the user
            $email    = $this->request->getPost("email");
            /*$password = $this->request->getPost("password");*/
            $password = ($this->request->getPost('password'));
            
              $user = Users::findFirstByUsername($email);
        if ($user) {
            if ($this->security->checkHash($password,$user->password)) {
                $this->session->set("user", $user->username);
                $this->session->set("name", $user->name);
                $this->session->set("role", $user->role);
                $this->session->set("id", $user->id);
                $this->flash->success(
                    "Welcome " . $user->name
                );
                return $this->dispatcher->forward(
                [
                    "controller" => "",
                    "action"     => "index",
                ]
                 );
                // The password is valid
            }
        } 
            
        $this->view->setVar('wrong', "sai mat khau hoac user");
        }

        // Forward to the login form again
        return $this->dispatcher->forward(
            [
                "controller" => "session",
                "action"     => "login",
            ]
        );
    }

     public function logoutAction()
    {
        // Destroy the whole session
        $this->session->destroy();
        $this->response->redirect("session");
    }
}