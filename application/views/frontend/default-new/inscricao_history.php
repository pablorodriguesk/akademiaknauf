<?php $incricoes = $this->akademia_model->inscricoes($this->session->userdata('user_id'))->result();?>
<?php  $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array(); ?>
<?php include "breadcrumb.php"; ?>

  <!-------- Wish List body section start ------>
<section class="wish-list-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "profile_menus.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="purchase-body common-card">
                <h1>Turmas</h1>
                    <table class="table">
                        <thead class="table-head">
                            <tr>
                                <th scope="col"><h6>Turma</h6></th>
                                <th scope="col"><h6>Curso</h6></th>
                                <th scope="col"><h6>Unidade</h6></th>
                                <th scope="col"><h6>Data</h6></th>
                                <th scope="col"><h6>Horario</h6></th>
                                <th scope="col" class="w-auto"></h6></th>
                            </tr>
                        </thead>        
                        <div class="purchase-2">
                            <tbody>
                            <?php

                           
                                foreach($incricoes as $inscricao):
                                $turma = $this->akademia_model->buscar_turma($inscricao->id_turma);
                                $unidade = $this->akademia_model->unidades($turma->row('Unidade'));
                                $cursos = $this->akademia_model->buscar_curso($inscricao->id_curso);
                                //$curso = $this->crud_model->get_course_by_id($each_purchase['course_id'])->row_array();
                                //$unidade = $this->crud_model->get_course_by_id($each_purchase['course_id'])->row_array();
                                
                              
                                ?>
                                    <tr>
                                        
                                        <td><h5><?= $turma->row('turma'); ?></h5></td>
                                        <td><h5><?= $cursos->row('title'); ?></h5></td>
                                        <td><h5><?= $unidade->row('lugar'); ?></h5></td>
                                        <td><h5><?= (new \DateTimeImmutable($turma->row('dataini')))->format('d/m/Y');?> <br>a <?= (new \DateTimeImmutable($turma->row('datafim')))->format('d/m/Y'); ?></h5></td>
                                        <td><h4><?=  $turma->row('horaini'); ?></h4></td>
                                        <td><h5><?php //echo date('d M Y', $each_purchase['date_added']); ?></h5></td>
                                        <td>
                                        <div class="child-icon">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle py-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                                        <li>
                                                            <a class="dropdown-item py-2" href="<?php echo site_url('home/course/'.rawurlencode(slugify($cursos->row('title'))).'/'.$cursos->row('id')); ?>"><?php echo get_phrase('Go to course page') ?></a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item py-2" href="<?php echo site_url('home/instructor_page/'.$cursos->row('creator')) ?>"><?php echo get_phrase('Author profile') ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>