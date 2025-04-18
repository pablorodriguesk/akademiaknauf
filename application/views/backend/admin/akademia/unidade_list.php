
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Unidades
                    <a href="<?php echo site_url('akademia/unidade_form/add_unidade'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Adicionar Nova Unidade</a>
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
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cidade</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Cep</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach( $unidade as $unidades): ?>
                                <tr>
                                    <td><?= $unidades->id; ?></td>
                                    <td><strong><?= $unidades->lugar; ?></strong></td>
                                    <td><?= $unidades->endereco; ?></td>
                                    <td><?= $unidades->telefone; ?></td>
                                    <td><?= $unidades->cep; ?></td>
                                   
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('akademia/unidade_form/edit_unidade/'.$unidades->id); ?>" ><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item"  href="#" onclick="confirm_modal('<?php echo site_url('akademia/delete_unidade/' . $unidades->id); ?>');"> <?php echo get_phrase('delete'); ?></a></li>
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