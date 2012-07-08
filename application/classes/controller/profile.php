<?php defined('SYSPATH') or die('No direct script access.');

    class Controller_Profile extends Controller_Template {
        public $template = 'template';

        public function before() {
            parent::before();
            if(Auth::instance()->logged_in('login')) {
                $this->user = $_SESSION['auth_user'];
            } else {
                Notify::msg("You must be logged in to manage your profile.","error");
                $this->request->redirect('auth/login');
            }
        }

        public function action_index()
        {
            $view = View::factory('profile/index')->bind('errors',$errors);
            $view->user = $this->user;

            $post = $this->request->post();
            $view->post = $this->user;

            if (HTTP_Request::POST == $this->request->method()) {
                $view->post = (object) $this->request->post();
                $username = array_key_exists('username', $this->request->post()) ? (string) $post['username'] : '';
                $email = array_key_exists('email', $this->request->post()) ? (string) $post['email'] : '';
                try {
                    // Create the user using form values
                    $this->user = $this->user->update_user($post, array(
                        'username',
                        'email'
                    ));

                    Notify::msg('Your account has been updated.','success');
                    $this->request->redirect("");
                } catch (ORM_Validation_Exception $e) {
                    // Set failure message
                    Notify::msg('Unable to update account.','error');
                    // Set errors using custom messages
                    $errors = $e->errors('models');
                }
            }

            $this->template->title = "Profile";
            $this->template->content = $view;
        }

    }