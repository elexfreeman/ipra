<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*контроллер главной страницы*/
class Pg extends CI_Controller {

    /*тут хранятся настройки, закгружаются в конструкторе*/
    public $settings;
    public $data;

    public function __construct()
    {
        parent::__construct();
        /*Загружаем  библиотеку сессий*/
        $this->load->library('session');
        $this->load->library('form_validation');

        /*Загружаем модели*/


        /*Закгружаем хелперы*/
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('pg_model');

    }

	public function index()
	{

            echo "done";
	}



}
