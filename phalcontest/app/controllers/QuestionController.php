<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
use Library\Forms\SearchForm;

class QuestionController extends ControllerBase
{


    /**
     * Show property list
     *
     * @param 
     */
    public function indexAction()
    {

        $name = $this->request->get('name');
        $barcode = $this->request->get('code');
        $module = $this->request->get('module');
        
        $data = $this->modelsManager->createBuilder()
            ->columns(array(
                'Question.id',
                'Question.question',
                'Question.answer1',
                'Question.answer2',
                'Question.answer3',
                'Question.answer4',
                'Question.correctanswer',
                'Question.image',
                
                'M.name kindname',
                

            ))
            ->from('Question')
            ->leftjoin('Module', 'M.code = Question.kindcode', 'M')
            
            ->where('1=1');
            /*$kt="su dung";
            $data->andWhere('S.name LIKE "%' . $kt . '%"');*/

        //Create array value of request to find in Property
        $array_request = array();
        if ($name) {
            $array_request['name'] = $name;
            $data->andWhere('Question.question LIKE "%' . $name . '%"');
        }
        if ($barcode) {
            $array_request['barcode'] = $barcode;
            $data->andWhere('Question.id LIKE "%' . $barcode . '%"');
        }
        if ($module) {
            $array_request['module'] = $module;
            $data->andWhere('Question.kindcode LIKE "%' . $module . '%"');
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
            'module' => $module,
            
        ));
        $this->view->form = $form;

    }

    /**
     * Delete a property
     *
     * @param string $code
     */
    public function deleteAction($code)
    {
        $question = Question::findFirstById($code);
        if (!$question) {
            $this->flash->error("Không tìm thấy câu hỏi.");

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "index"
            ));
        }

        if (!$question->delete()) {

            foreach ($question->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "question",
                "action" => "search"
            ));
        }

        $this->flashSession->success("Xóa câu hỏi thành công.");

        return $this->response->redirect('question');
    }

    /**
     * Edit a property
     *
     * @param string $code
     * 
     */
    public function editAction($code)
    {
       $question = Question::findFirstById($code);

        if ($question) {
            if ($this->request->isPost()) {
                
                $question->kindcode = $this->request->getPost('kindcode');
                $question->question = $this->request->getPost('question');
                $question->answer1 = $this->request->getPost('answer1');
                $question->answer2 = $this->request->getPost('answer2');
                $question->answer3 = $this->request->getPost('answer3');
                $question->answer4 = $this->request->getPost('answer4');
                $question->correctanswer = $this->request->getPost('correctanswer');
                $question->image = $this->request->getPost('image');
                
               
                if (!$question->save()) {
                    foreach ($question->getMessages() as $message) {
                        $this->flashSession->error($message);
                    }
                } else {
                    $this->flashSession->success("Cập nhật thành công");

                    return $this->response->redirect('question');
                }
            }

        
            $form = new QuestionsForm($question);
            $this->view->form = $form;
        } else {
            $this->flash->error("Không tìm thấy dữ liệu");

            return $this->response->redirect('question');
        }
    }

    public function addAction()
    {
        $form = new QuestionsForm();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {

                $question = new Question();

                $question->assign(array(
                    'id' => $this->request->getPost('id'),
                    'kindcode' => $this->request->getPost('kindcode'),
                    'question' => $this->request->getPost('question'),
                    'answer1' => $this->request->getPost('answer1'),
                    'answer2' => $this->request->getPost('answer2'),
                    'answer3' => $this->request->getPost('answer3'),
                    'answer4' => $this->request->getPost('answer4'),
                    'correctanswer' => $this->request->getPost('correctanswer'),
                    'image' => $this->request->getPost('image'),
                    
                    
                ));
                $form = new  QuestionsForm($question);


                if (!$question->save()) {
                    foreach ($question->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    
                    $this->flashSession->success("Thêm câu hỏi thành công");

                    return $this->response->redirect('question');
                }
            }
        }

        $this->view->form = $form;
    }
}

