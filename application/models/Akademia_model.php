<?php
defined('BASEPATH') or exit('No direct script access allowed');


//v5.7
class Akademia_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }
    public function get_cursoPresenciais()
    {

        $cursos = $this->db->query('select title, id from course WHERE sub_category_id = 1 ');
        return $cursos;
    }


//--------------------------------------------------------------------models Turma inicio-------------------------------------------
    public function list_turma()
    {
        $turma = $this->db->query('select * from turma');
        return $turma;
    }
    public function buscar_turma($idturma)
    {
        return $this->db->get_where('turma', array('id' => $idturma));  
    }
    public function inserir_turma($data)
    {
        $this->db->insert('turma', $data);
        $turma_id = $this->db->insert_id();
        return $turma_id;
    }

    public function turmasAtivas($idcurso){

        $turma = $this->db->query('select * from turma where status = 1 AND curso ='.$idcurso);
        return $turma;
    }

    public function get_class_by_id($id)
    {
        return $this->db->get_where('turma', array('id' => $id));        
    }

    public function update_turma ($data){
        $this->db->where('id', $data['id']);
        $this->db->update('turma', $data);
        return $data['id'];
    }
    
    //--------------------------------------------------------------------models Turma fim-------------------------------------------
    //--------------------------------------------------------------------models Unidade Inicio-------------------------------------------
    public function get_Unidades()
    {
        $unidade = $this->db->query('select lugar,id from unidade');
        return $unidade;
    }

    public function get_unit_by_id($id)
    {
        return $this->db->get_where('unidade', array('id' => $id));        
    }

    public function get_use_units($id)
    {
        $turma = $this->db->query('select * from turma where Unidade ='.$id);
        return $turma->num_rows() ;
    }

    public function list_Unidades()
    {

        $unidade = $this->db->query('select * from unidade');
        return $unidade;
    }
    public function inserir_unidade($data)
    {
        $this->db->insert('unidade', $data);
        return true;
    }

    public function delete_unit($id){
        $this->db->where('id', $id);
        return $this->db->delete('unidade');
      
    }

    public function update_unidade($data){
        $this->db->where('id', $data['id']);
        $this->db->update('unidade', $data);
        return $data['id'];
    }

    public function unidades($idunidade){

        return $this->db->get_where('unidade', array('id' => $idunidade));  
    }
    //--------------------------------------------------------------------models unidade fim-------------------------------------------
    /*------------------------------------------------------iNSCRIÇÃO------------------------------------------------------------------*/
    public function buscar_curso($idcurso)
    {
        return $this->db->query("select * from course where id=".$idcurso);  
    }
    public function buscar_unidade($idunidade)
    {
        return $this->db->get_where('unidade', array('id' => $idunidade))->row_array();  
    }

    public function inserir_inscricao($data)
    {
        $this->db->insert('inscricao', $data);
        return true;
    }

    public function validar_aluno($id_aluno,$id_turma)
    {
        $query =  $this->db->query('select id,id_aluno, id_turma from inscricao where id_aluno = '.$id_aluno.' AND id_turma ='.$id_turma);
       
       
        if($query->num_rows() > 0){
        
        return TRUE;

       }
    }

    public function inscricoes($user_id)
    {
        
        return $this->db->query('SELECT * FROM inscricao WHERE id_aluno='.$user_id);   

    }
    public function inscricoesall()
    {
        
        return $this->db->query('SELECT * FROM inscricao');   

    }


    public function tipo($idcurso)
    {
           
        $tipo = $this->db->query('SELECT tipo FROM course WHERE id ='.$idcurso);

        return $tipo;

    }
    public function aluno($idaluno)
    {
           
         return $this->db->query('SELECT * FROM users WHERE id ='.$idaluno);


    }
     /*------------------------------------------------------Cadastro------------------------------------------------------------------*/

     public function estados(){

         return $this->db->query('SELECT * FROM estados');


     }
     public function cidades(){

        return $this->db->query('SELECT * FROM cidades ');


        


     }

}
