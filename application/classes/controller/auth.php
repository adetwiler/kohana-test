<?php defined('SYSPATH') or die('No direct script access.');

    /**
     * Handles login/logout and create account.
     */
    class Controller_Auth extends Controller_Template
    {

        public $template = 'template'; // Use the default template

        /**
         * Shows the login page and handles login
         * @return void
         */
        public function action_login()
        {
            HTTP_Request::POST == $this->request->method();
            // Logged in users should not see this page
            if (Auth::instance()->logged_in()) {
                $this->request->redirect('');
            }

            // If the login form was posted...
            $post = $this->request->post();
            if (HTTP_Request::POST == $this->request->method()) {
                $remember = array_key_exists('remember', $this->request->post()) ? (bool) $post['remember'] : FALSE;
                // Try to login
                if (Auth::instance()->login($post['username'], $post['password'])) {
                    $this->request->redirect('');
                } else {
                    Notify::msg('Invalid username or password.', 'error');
                }
            }

            $this->template->content = View::factory('auth/login');
            $this->template->title = 'Login';

        }

        function action_signup() {
            HTTP_Request::POST == $this->request->method();
            // Logged in users should not see this page
            if (Auth::instance()->logged_in()) {
                $this->request->redirect('');
            }

            // If the Signup form was posted...
            $post = $this->request->post();
            if (HTTP_Request::POST == $this->request->method()) {
                $username = array_key_exists('username', $this->request->post()) ? (string) $post['username'] : '';
                $password = array_key_exists('password', $this->request->post()) ? (string) $post['password'] : '';
                $email = array_key_exists('email', $this->request->post()) ? (string) $post['email'] : '';
                try {
                    // Create the user using form values
                    $user = ORM::factory('user')->create_user($post, array(
                        'username',
                        'password',
                        'email'
                    ));

                    // Grant user login role
                    $user->add('roles', ORM::factory('role', array('name' => 'login')));

                    Notify::msg('Your account has been created. Please login','success');
                    $this->request->redirect("auth/login");
                } catch (ORM_Validation_Exception $e) {
                    // Set failure message
                    Notify::msg('Unable to create account.','error');
                    // Set errors using custom messages
                    $errors = $e->errors('models');
                }
            }

            $this->template->content = View::factory('auth/signup')->bind('errors',$errors);
            $this->template->title = 'Signup';

        }


        /**
         * Log the user out
         * @return void
         */
        public function action_logout()
        {
            Auth::instance()->logout();
            $this->request->redirect('auth/login');
        }

    }