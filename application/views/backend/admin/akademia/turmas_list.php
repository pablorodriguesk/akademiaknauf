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
                                <th>ID</th>
                                <th>Turma</th>
                            <th>curso</th>
                            <th>Unidade </th>
                            <th>Data de Inicio</th>
                            <th>Data de Termino </th>
                            <th>Quantidade de Alunos</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach( $turmas as $dadoturmas): ?>
                                <tr>
                                    <td><?= $dadoturmas->id; ?></td>
                                    <td><strong><?= $dadoturmas->turma; ?></strong></td>
                                    <td><?= $dadoturmas->curso; ?></td>
                                    <td><?= $dadoturmas->Unidade; ?></td>
                                    <td><?= $dadoturmas->dataini; ?></td>
                                    <td><?= $dadoturmas->datafim; ?></td>
                                    <td><?= $dadoturmas->alunos; ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('akademia/turma_form/turma_edit/'.$dadoturmas->id); ?>" ><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item"  href="#" onclick="confirm_modal('<?php echo site_url('akademia/delete_turma/' . $dadoturmas->id); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
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
