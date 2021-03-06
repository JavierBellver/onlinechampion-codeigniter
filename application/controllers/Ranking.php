<?php
 
class Ranking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ranking_model');
        $this->load->model('Juego_model');
        $this->load->library('session');
    } 

    function index()
    {
        $data['ranking'] = $this->Ranking_model->get_all_ranking();
        $this->load->view('ranking/index',$data);
    }

    function read($id)
    {
        $data['ranking'] = $this->Ranking_model->get_ranking($id);
        $data['usuarios'] = $this->Ranking_model->get_users_by_ranking($id);
        $this->load->view('ranking/detail',$data);
    }

    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('numRanking','NumRanking','required|integer');
		$this->form_validation->set_rules('Juego','Juego','required|integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'numRanking' => $this->input->post('numRanking'),
				'juego' => $_POST['Juego'],
            );
            $ranking_id = $this->Ranking_model->add_ranking($params);
            redirect('ranking/index');
        }
        else
        {
			$this->load->model('Juego_model');
			$data['Juegos'] = $this->Juego_model->get_all_juego();
            $this->load->view('ranking/add',$data);
        }
    }  

    function edit($id)
    {
        $ranking = $this->Ranking_model->get_ranking($id);
        
        if(isset($ranking['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('numRanking','NumRanking','required|integer');
			$this->form_validation->set_rules('juego','Juego','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'numRanking' => $this->input->post('numRanking'),
					'juego' => $this->input->post('juego'),
                );
                $this->Ranking_model->update_ranking($id,$params);            
                redirect('ranking/index');
            }
            else
            {   
                $data['ranking'] = $this->Ranking_model->get_ranking($id);
    
				$this->load->model('Juego_model');
				$data['all_juego'] = $this->Juego_model->get_all_juego();

                $this->load->view('ranking/edit',$data);
            }
        }
        else
            show_error('The ranking you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $ranking = $this->Ranking_model->get_ranking($id);

        if(isset($ranking['id']))
        {
            $this->Ranking_model->delete_ranking($id);
            redirect('ranking/index');
        }
        else
            show_error('The ranking you are trying to delete does not exist.');
    }
}
