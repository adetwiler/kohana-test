<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {
    public $template = 'template';

	public function action_index()
	{
        $view = View::factory('home/index');
        $view->states = array('Arizona','California');

        $this->template->title = "Test";
        $this->template->content = $view;
	}

} // End Welcome
