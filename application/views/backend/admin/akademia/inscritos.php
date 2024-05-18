<?php $incricoes = $this->akademia_model->inscricoesall()->result();?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" media="screen" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" media="screen" />

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Turmas
                    <a href="<?php echo site_url('akademia/turma_form/add_turma'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Adicionar Nova Turma</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('coupons'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table  class="table table-striped table-centered w-100" id="server_side_users_data">
                        <thead>
                        <tr>
                                <th scope="col"><h6>Turma</h6></th>
                                <th scope="col"><h6>Aluno</h6></th>
                                <th scope="col"><h6>Curso</h6></th>
                                <th scope="col"><h6>Unidade</h6></th>
                                <th scope="col"><h6>Data</h6></th>
                                <th scope="col"><h6>Horario</h6></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($incricoes as $inscricao):
                                $turma = $this->akademia_model->buscar_turma($inscricao->id_turma);
                                $unidade = $this->akademia_model->unidades($turma->row('Unidade'));
                                $cursos = $this->akademia_model->buscar_curso($inscricao->id_curso);
                                $aluno= $this->akademia_model->aluno($inscricao->id_aluno);
                                 ?>
                                
                               <tr>
                                        
                                        <td><h5><?= $turma->row('turma'); ?></h5></td>
                                        <td><h5><?= $aluno->row('first_name'); ?></h5></td>
                                        <td><h5><?= $cursos->row('title'); ?></h5></td>
                                        <td><h5><?= $unidade->row('lugar'); ?></h5></td>
                                        <td><h5><?= (new \DateTimeImmutable($turma->row('dataini')))->format('d/m/Y');?> <br>a <?= (new \DateTimeImmutable($turma->row('datafim')))->format('d/m/Y'); ?></h5></td>
                                        <td><h4><?=  $turma->row('horaini'); ?></h4></td>
                                        <td><h5><?php //echo date('d M Y', $each_purchase['date_added']); ?></h5></td>
                                        
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script>
    new DataTable('#basic3-datatable', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>
<script>
        $(document).ready(function() {
            $('.datatable-buttons').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/German.json"
                }
            });
        });
    </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

