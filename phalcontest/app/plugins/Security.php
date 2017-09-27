<?php
use Phalcon\Acl;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;


class Security extends Plugin 
{    public function __construct($dependencyInjector) 
    {        
        $this->_dependencyInjector = $dependencyInjector;    
    }
   
    public function getAcl() 
    {        
        if (!isset($this->persistent->acl)) 
        {            
            $acl = new Phalcon\Acl\Adapter\Memory();            
            $acl->setDefaultAction(Phalcon\Acl::DENY);           
            $roles = array('users' => new Phalcon\Acl\Role('Users'),
                                        'guests' => new Phalcon\Acl\Role('Guests'),
                                        'students'=>new Phalcon\Acl\Role('Students') );      
            foreach ($roles as $role) 
            {              
                $acl->addRole($role);            
            }       
            $private = array(   'schedule' => array('index', 'add', 'delete','edit'),  
                                'question' => array('index','delete' ,'add', 'edit'),
                                'dethi' => array('index','upload', 'lab', 'mark','maketest','importexcel'),
                                'score' => array('index','add','importexcel','upload') ,
                                'roles'=> array('index','delete','edit','add'),
                                'test' => array('index','delete','detail','exportexcel'),
                                'users'=> array('index','add','edit','changepassword','delete','deleteMultiCheck','upload','importexcel'),
                                'module'=> array('index','delete','edit','add'),
 
                );            
            foreach ($private as $resource => $actions) 
            {               
                $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);            
            }            
            $public = array('index' => array('index',''),  
                'exam' => array('index','test','mark','save'),
                'dethi' => array('index','mark','lab'),
            'session'=>array('index','start','logout','login'),              
                            
            'users' => array('index'));            
            foreach ($public as $resource => $actions) 
            {                
             $acl->addResource(new Phalcon\Acl\Resource($resource), $actions);            
            }           
            foreach ($roles as $role) 
            {                
                foreach ($public as $resource => $actions) 
                {                    
                    foreach ($actions as $action) 
                    {   
                         $acl->allow('Guests', $resource, $action);                
                        $acl->allow('Users', $resource, $action);
                        $acl->allow('Students', $resource, $action);                     
                    }                
                }            
            }            
            foreach ($private as $resource => $actions) 
            {                
                foreach ($actions as $action) 
                {                    
                    $acl->allow('Users', $resource, $action);
                }            
            }            
            $this->persistent->acl = $acl;        
        }        
            return $this->persistent->acl;    
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        // Check whether the "auth" variable exists in session to define the active role
        // $user = $this->session->get('user');
        // if (!$user) {
        //     $role = 'Guests';
        // } else 
        // {
        //     $role = 'Users';
        // }
        $user = $this->session->get('user');
        $per=$this->session->get('role');
        if (!$user) {
            $role = 'Guests';
        } elseif($per==1) {
            $role = 'Users';
        }elseif($per==2)
        {
            $role='Students';
        }
        // Take the active controller/action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        // Obtain the ACL list
        $acl = $this->getAcl();

        // Check if the Role have access to the controller (resource)
        $allowed = $acl->isAllowed($role, $controller, $action);
        
        if ($allowed != Acl::ALLOW) {

            // If he doesn't have access forward him to the index controller
            
            if($dispatcher->getControllerName() != 'session')
            {
            $this->flash->error("You don't have access to this module");
            $dispatcher->forward(
                array(
                    'controller' => 'index',
                    'action'     => 'index'
                )
            );
            return false;
        }
            // Returning "false" we tell to the dispatcher to stop the current operation
            return;
        }
    }
}