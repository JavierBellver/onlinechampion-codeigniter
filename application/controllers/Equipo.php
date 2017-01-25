<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Equipo_model');
        $this->load->library('session');
    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]');
        $this->form_validation->set_rules('descripcion','Descripcion','required');
        $this->form_validation->set_rules('categoria','Categoria','required|max_length[20]');

        if($this->form_validation->run())
        {
            $params = array(
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'categoria' => $this->input->post('categoria'),
            );

            $juego_id = $this->Juego_model->add_juego($params);
            redirect('juego/index');
        }
        else
        {
            $this->load->view('juego/add');
        }
    }
}