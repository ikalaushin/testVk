<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Vk
 *
 * @property Template $template
 */
class Vk extends CI_Controller {

    var $layoutParams = [
        'title' => 'Ikalaushin test Vk project',
        'description' => 'Ikalaushin test Vk project',
        'keywords' => 'Vk, API',
    ];

    var $data = [];


    public function __construct() {
        parent::__construct();
        $this->data = [
            'layoutParams' => $this->layoutParams,
        ];
    }

    /**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
	    $this->form();
	}

    /**
     *
     */
    public function form() {
        $this->data['title'] = 'My foo page';
        $this->template->load('common/base_layout', 'vk/form', $this->data);
	}

    /**
     *
     */
    public function search() {
        $q = $this->input->get('q', '');
        $startFrom = $this->input->get('start_from', 1);
        $this->load->model('vkModel');
        $this->data['results'] = $this->vkModel->search($q, $startFrom);

        $this->load->library('pagination');
        $this->config->load('pagination', true);
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url();
        $config['total_rows'] = $this->data['results']['count'];
        $config['per_page'] = config_item('vk_per_page');

        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();


        $this->template->load('common/base_layout', 'vk/results', $this->data);

	}

    public function view($id = '') {
        $this->load->model('vkModel');
        $this->data['result'] = $this->vkModel->getNewsById($id);

        $this->template->load('common/base_layout', 'vk/view_one', $this->data);
    }
}
