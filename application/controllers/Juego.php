<?php
 
class Juego extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Juego_model');
        $this->load->model('Ranking_model');
        $this->load->library('session');
    } 

    function index()
    {
        $data['Juegos'] = $this->Juego_model->get_all_juego();

        $this->load->view('juego/index',$data);
    }

    function read($id)
    {
        $data['juego'] = $this->Juego_model->get_juego($id);
        $this->load->view('juego/detail',$data);
    }

    function backofficeList()
    {
        $this->load->view('Backoffice/juego');
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
            $rankingdata = array(
                'numRanking' => 6,
                'juego' => $juego_id,
            );
            $ranking_id = $this->Ranking_model->add_ranking($rankingdata);
            $data['Juegos'] = $this->Juego_model->get_all_juego();
            $this->load->view('Backoffice/Juego/index',$data);
        }
        else
        {
            $this->load->view('Backoffice/juego/add');
        }
    }  

    function edit($id)
    {
        $juego = $this->Juego_model->get_juego($id);
        
        if(isset($juego['id']))
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

                $this->Juego_model->update_juego($id,$params);
                $data['Juegos'] = $this->Juego_model->get_all_juego();
                $this->load->view('Backoffice/Juego/index',$data);
            }
            else
            {   
                $data['juego'] = $this->Juego_model->get_juego($id);
    
                $this->load->view('Backoffice/Juego/edit',$data);
            }
        }
        else
            show_error('The juego you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $juego = $this->Juego_model->get_juego($id);

        // check if the juego exists before trying to delete it
        if(isset($juego['id']))
        {
            $this->Juego_model->delete_juego($id);
            $data['Juegos'] = $this->Juego_model->get_all_juego();
            $this->load->view('Backoffice/Juego/index',$data);
        }
        else
            show_error('The juego you are trying to delete does not exist.');
    }
}
