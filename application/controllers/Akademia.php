<?php

class Akademia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set(get_settings('timezone'));

        $this->load->model('akademia_model');
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        $this->user_model->check_session_data('admin');

        ini_set('memory_limit', '128M');
    }
    public function index()
    {
        if ($this->session->userdata('admin_login') == true) {
            $this->dashboard();
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index', $page_data);
    }


    //------------------------------------------------------------------------Controle de turmas----------------------------------
    public function turmas()
    {
        $this->load->database();
        $this->user_model->check_session_data('admin');
        $turma =  $this->akademia_model->list_turma();
        $page_data['turmas'] = $turma->result();
        $page_data['page_title'] = "Turmas";
        $page_data['heads_up'] = get_phrase('Atenção, essa ação requer cuidado');
        $page_data['page_name'] = 'akademia/turmas_list';
        $this->load->view('backend/index', $page_data);
    }
    public function delete_turma($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('turma');
        redirect(site_url('akademia/turmas'), 'refresh');
    }

    public function turma_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == "add_turma") {
            $cursos = $this->akademia_model->get_cursoPresenciais();
            $unidade = $this->akademia_model->get_Unidades();

            $page_data['page_name'] = 'akademia/turma_add';
            $page_data['curso'] = $cursos->result_array();
            $page_data['unidade'] = $unidade->result_array();
            $page_data['page_title'] = get_phrase('add_category');
            $this->load->view('backend/index', $page_data);
        }
        if ($param1 == "edit_category") {

            $page_data['page_name'] = 'category_edit';
            $page_data['page_title'] = get_phrase('edit_category');
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['category_id'] = $param2;
        }
        if ($param1 == "turma_update") {

            $data['id']   = html_escape($this->input->post('id'));
            $data['curso']   = html_escape($this->input->post('curso'));
            $data['unidade'] = html_escape($this->input->post('unidade'));
            $data['diasdecurso'] = html_escape($this->input->post('diasdecurso'));
            $data['dataini'] = html_escape($this->input->post('dataini'));
            $data['horaini'] = html_escape($this->input->post('horaini'));
            $data['datafim'] = html_escape($this->input->post('datafim'));
            $data['alunos'] = html_escape($this->input->post('alunos'));
            $turma_id = $this->akademia_model->update_turma($data);

            redirect(site_url('akademia/turmas'), 'refresh');
        }
        if ($param1 == "criarTurma") {

            $this->user_model->check_session_data('admin');

            $data['turma']   = html_escape($this->input->post('turma'));
            $data['curso']   = html_escape($this->input->post('curso'));
            $data['unidade'] = html_escape($this->input->post('unidade'));
            $data['diasdecurso'] = html_escape($this->input->post('diasdecurso'));
            $data['dataini'] = html_escape($this->input->post('dataini'));
            $data['horaini'] = html_escape($this->input->post('horaini'));
            $data['datafim'] = html_escape($this->input->post('datafim'));
            $data['alunos'] = html_escape($this->input->post('alunos'));

            $turma_id = $this->akademia_model->inserir_turma($data);

            if (!empty($turma_id)) {
                redirect(site_url('akademia/turma_form/turma_edit/' . $turma_id), 'refresh');
                /*$page_data['page_name'] = 'akademia/turma_add';
                echo "Salvo no banco de dados";*/
            } else {

                echo "Erro ao salvar";
            }
        }
        if ($param1 == "turma_edit") {

            $cursos = $this->akademia_model->get_cursoPresenciais();
            $unidade = $this->akademia_model->get_Unidades();
            $page_data['page_name'] = 'akademia/turma_edit';
            $page_data['curso'] = $cursos->result_array();
            $page_data['unidade'] = $unidade->result_array();
            $page_data['page_title'] = get_phrase('turma_edit');

            $page_data['course_id'] =  $param2;
            $page_data['languages'] = $this->crud_model->get_all_languages();
            //$page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/index', $page_data);
        }

        //$this->load->view('backend/index', $page_data);
    }




    //--------------------------------------------------------------------fim controle de turmas------------------------------------------------------------
    //--------------------------------------------------------------------cntrole de unidade------------------------------------------------------------

    public function unidades()
    {
        $this->load->database();
        $this->user_model->check_session_data('admin');
        $unidade =  $this->akademia_model->list_unidades();
        $page_data['unidade'] = $unidade->result();
        $page_data['page_title'] = "Unidades";
        $page_data['heads_up'] = get_phrase('Atenção, essa ação requer cuidado');
        $page_data['page_name'] = 'akademia/unidade_list';
        $this->load->view('backend/index', $page_data);
    }

    public function delete_unidade($id)
    {
        $unidade =  $this->akademia_model->get_use_units($id);

        /*verifica se a unidade está em uso em alguma turma*/
        if ($unidade <= 0) {
            $this->db->where('id', $id);
            $this->db->delete('unidade');
        }
        redirect(site_url('akademia/unidades'), 'refresh');
    }

    public function unidade_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == "add_unidade") {
            $page_data['page_name'] = 'akademia/unidades_add';
            $page_data['page_title'] = get_phrase('add_category');
        }
        if ($param1 == "edit_unidade") {

            $page_data['page_name'] = 'akademia/unidades_edit';
            $page_data['page_title'] = get_phrase('unit_edit');
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['unit_id'] = $param2;
        }

        if ($param1 == "confirm_update") {
            $data['id']   = html_escape($this->input->post('id'));
            $data['lugar']   = html_escape($this->input->post('lugar'));
            $data['endereco'] = html_escape($this->input->post('endereco'));
            $data['telefone'] = html_escape($this->input->post('telefone'));
            $data['cep'] = html_escape($this->input->post('cep'));
            $turma_id = $this->akademia_model->update_unidade($data);

            redirect(site_url('akademia/unidades'), 'refresh');
        }
        if ($param1 == "criarUnidade") {

            $this->user_model->check_session_data('admin');

            $data['lugar']   = html_escape($this->input->post('cidade'));
            $data['endereco']   = html_escape($this->input->post('endereco'));
            $data['telefone'] = html_escape($this->input->post('telefone'));
            $data['cep'] = html_escape($this->input->post('cep'));
            $enviado = $this->akademia_model->inserir_unidade($data);

            if ($enviado) {

                $page_data['page_name'] = 'akademia/turma_add';
                redirect(site_url('akademia/unidades'), 'refresh');
            } else {

                echo "Erro ao salvar";
            }
        }

        $this->load->view('backend/index', $page_data);
    }

    /*----------------------------------------------------------------------inscrição de curso -------------------------------*/

    public function inscricaoPresencial($turma_id)
    {
        $course_details = $this->crud_model->get_course_by_id($turma_id)->row_array();

        if ($this->session->userdata('user_login') == 1) {
            $this->crud_model->enrol_to_free_course($turma_id, $this->session->userdata('user_id'));
            redirect(site_url('home/course/' . slugify($course_details['title']) . '/' . $turma_id), 'refresh');
        } else {
            $url = site_url('home/course/' . slugify($this->crud_model->get_course_by_id($turma_id)->row('title')) . '/' . $turma_id);
            set_url_history($url);
            redirect(site_url('login'), 'refresh');
        }
    }


    public function dadosIncricao($idturma)
    {


        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        } else {


            $turma = $this->akademia_model->buscar_turma($idturma);
            $idcurso = (int)$turma->row('curso');
            $curso = $this->akademia_model->buscar_curso($idcurso);
            $idunidade = (int)$turma->row('unidade');
            $unidade = $this->akademia_model->buscar_unidade($idunidade);

            $inscricao["id_turma"] = $idturma;
            $inscricao["id_curso"] =  $curso["id"];
            $inscricao["id_aluno"] = $this->session->userdata('user_id');

            if ($this->akademia_model->validar_aluno($inscricao["id_aluno"], $idturma)) {

                echo "Erro ao inserir dados!";
            } else {


                $this->akademia_model->inserir_inscricao($inscricao);
            }
        }
    }

    public function inscritos()
    {

        $this->load->database();
        $this->user_model->check_session_data('admin');
        $unidade =  $this->akademia_model->list_unidades();
        $page_data['unidade'] = $unidade->result();
        $page_data['page_title'] = "Unidades";
        $page_data['heads_up'] = get_phrase('Atenção, essa ação requer cuidado');
        $page_data['page_name'] = 'akademia/inscritos';
        $this->load->view('backend/index', $page_data);

        
    }
}
