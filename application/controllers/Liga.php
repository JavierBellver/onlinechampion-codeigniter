<?php
 
class Liga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Liga_model');
        $this->load->model('Juego_model');
        $this->load->model('Ranking_model');
        $this->load->library('session');
    } 

    function index()
    {
        $data['liga'] = $this->Liga_model->get_all_liga();

        if(isset($this->session->id['id'])) {
            $validated = array();

            foreach ($this->Liga_model->get_all_liga() as $l) {
                array_push($validated, $this->validate($l['idRanking']));
            }
            $data['validated'] = $validated;
        }
        $this->load->view('liga/index',$data);
    }

    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('numjugadores','Numjugadores','required|integer');
		$this->form_validation->set_rules('numplazasdisp','Numplazasdisp','required|integer');
		$this->form_validation->set_rules('numtemporadas','Numtemporadas','required|integer');
        $this->form_validation->set_rules('nombre','Nombre','required|max_length[40]');

		
		if($this->form_validation->run())     
        {
            $rankingId = $this->Ranking_model->add_ranking(array(
                'numRanking' => $this->input->post('numtemporadas'),
                'juego' => $_POST['Juego'],
            ));

            $params = array(
				'numjugadores' => $this->input->post('numjugadores'),
				'numplazasdisp' => $this->input->post('numplazasdisp'),
				'numtemporadas' => $this->input->post('numtemporadas'),
                'nombre' => $this->input->post('nombre'),
                'idJuego' => $_POST['Juego'],
                'idRanking' => $rankingId,
            );
            $liga_id = $this->Liga_model->add_liga($params);
            $data['liga'] = $this->Liga_model->get_all_liga();

            $this->load->view('Backoffice/Liga/index',$data);
        }
        else
        {
            $data['Juegos'] = $this->Juego_model->get_all_juego();
            $data['Rankings'] = $this->Ranking_model->get_all_ranking();
            $this->load->view('Backoffice/liga/add',$data);
        }
    }

    function edit($id)
    {
        $liga = $this->Liga_model->get_liga($id);
        
        if(isset($liga['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('numjugadores','Numjugadores','required|integer');
			$this->form_validation->set_rules('numplazasdisp','Numplazasdisp','required|integer');
			$this->form_validation->set_rules('numtemporadas','Numtemporadas','required|integer');
            $this->form_validation->set_rules('nombre','Nombre','required|max_length[40]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'numjugadores' => $this->input->post('numjugadores'),
					'numplazasdisp' => $this->input->post('numplazasdisp'),
					'numtemporadas' => $this->input->post('numtemporadas'),
                    'nombre' => $this->input->post('nombre'),
                );

                $this->Liga_model->update_liga($id,$params);
                $data['liga'] = $this->Liga_model->get_all_liga();

                $this->load->view('Backoffice/Liga/index',$data);
            }
            else
            {   
                $data['liga'] = $this->Liga_model->get_liga($id);
                $data['Juegos'] = $this->Juego_model->get_all_juego();
                $data['Rankings'] = $this->Ranking_model->get_all_ranking();
                $this->load->view('liga/edit',$data);
            }
        }
        else
            show_error('The liga you are trying to edit does not exist.');
    }

    function validate($id)
    {
        $idUsu=$this->session->id['id'];
        $inscritos=$this->db->get_where('usuarioranking',array('idRanking'=>$id))->result_array();

        foreach ($inscritos as $row)
        {
            if($row['idUsuario']==$idUsu) return 1;
        }
        return 0;
    }

    function join($id){
        $idUsu=$this->session->id['id'];
        $params= array(
            'ganadas'=>0,
            'jugadas'=>0,
            'puntos'=>0,
            'idRanking'=>$id,
            'idUsuario'=>$idUsu,
        );
        $this->db->insert('usuarioranking',$params);
    }

    function remove($id)
    {
        $liga = $this->Liga_model->get_liga($id);

        if(isset($liga['id']))
        {
            $this->Liga_model->delete_liga($id);
            $data['liga'] = $this->Liga_model->get_all_liga();
            $this->load->view('Backoffice/Liga/index',$data);
        }
        else
            show_error('The liga you are trying to delete does not exist.');
    }
    
}
