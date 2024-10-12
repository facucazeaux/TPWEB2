<?php

require_once 'apps/view/view.auth.php';
require_once 'apps/model/model.user.php';


    class AuthController
        {
            private $model;
            private $view;


            public function __construct()
            {   
                $this->model = new ModelUser();
                $this->view = new ViewAuth();
            }


            public function ShowLogin()
                {   
                    //muestro el formulario
                    return $this->view->ShowLogin();
                }

            public function Login()
                {
                    if(!isset($_POST['user'])|| empty($_POST['user']))
                        {
                            return $this->view->ShowLogin('Falta completar el nombre de usuario');
                        }

                    if(!isset($_POST['password'])|| empty($_POST['password']))
                        {
                            return $this->view->ShowLogin('Falta completar la prioridad');
                        }

                        $user = $_POST['user'];
                        $password = $_POST['password'];

                        //verifico que el usuario esta en la base de datos
                        $userFromBD = $this->model->getUsuarioByUsername($user);
                        
                        if (!$userFromBD) {
                            return $this->view->ShowLogin('El usuario no existe.');
                        }


                        if (password_verify($password, $userFromBD->password)) {
                            session_start();
                            $_SESSION['ID_USER'] =$userFromBD->id;
                            $_SESSION['USER_USER'] =$userFromBD->user;
                            
                            $_SESSION['LAST_ACTIVITY'] = time();
                            
                            
                            header('Location: '.BASE_URL);
                            
                        } else {
                            return $this->view->ShowLogin('Contraseña incorrecta');
                        }


        }


        public function logout()
            
            {   
                session_start();
                session_destroy();

                header('Location: '.BASE_URL.'login');
                exit();
            }
    
        }
?>