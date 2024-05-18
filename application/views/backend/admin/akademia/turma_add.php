<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_category'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">Criar Uma nova Turma</h4>

                    <form class="required-form" action="criarTurma" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" class="form-control" id="code" name="turma" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('generate_a_random_coupon_code'); ?>" onclick="generateARandomCouponCode()"><i class="mdi mdi-sync"></i> Gerar nome</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount_percentage"><?php echo get_phrase('number_of_students'); ?></label>
                            <div class="input-group">
                                <input type="number" name="alunos" id="discount_percentage" class="form-control" value="0" min="1" max="100">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date"><?php echo get_phrase('days'); ?><span class="required">*</span></label>
                            <input type="text" name="diasdecurso" class="form-control date" id="expiry_date" placeholder="<?php echo get_phrase('days'); ?>"  required>
                        </div> 
                        <div class="form-group">
                            <label for="expiry_date"><?php echo get_phrase('start_day'); ?><span class="required">*</span></label>
                            <!--<input type="date" name="dataini" class="form-control date" id="expiry_date" data-toggle="date-picker" data-single-date-picker="true" required>-->
                            <input type="date" class="form-control" id="time_class" name = "dataini" placeholder="<?php echo get_phrase('start_day'); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date"><?php echo get_phrase('start_time'); ?><span class="required">*</span></label>
                            <input type="time" name="horaini" class="form-control date" id="expiry_date" placeholder="<?php echo get_phrase('start_time'); ?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date"><?php echo get_phrase('closing_day'); ?><span class="required">*</span></label>
                            <input type="date" name="datafim" class="form-control date" id="expiry_date" placeholder="<?php echo get_phrase('closing_day'); ?>"  required>
                        </div>

                        <div class="form-group">
                            <label for="parent">Escolha o Curso Presencial</label>
                            <select class="form-control select2" data-toggle="select2" name="curso" id="parent" onchange="checkCategoryType(this.value)">
                                <option value="0"><?php echo get_phrase('Nenhum'); ?></option>
                                <?php foreach ($curso as $cursos) : ?>

                                    <option value="<?= $cursos["id"] ?>"><?= $cursos["title"] ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="parent">Escolha a Unidade</label>
                            <select class="form-control select2" data-toggle="select2" name="unidade" id="parent" onchange="checkCategoryType(this.value)">
                                <option value="0"><?php echo get_phrase('Nenhum'); ?></option>
                                <?php foreach ($unidade  as $unidades) : ?>

                                    <option value="<?= $unidades["id"] ?>"><?= $unidades["lugar"] ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>





                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Criar Turma</button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script type="text/javascript">
    function checkCategoryType(category_type) {
        if (category_type > 0) {
            $('#thumbnail-picker-area').hide();
        } else {
            $('#thumbnail-picker-area').show();
        }
    }
</script>
<script>
    function generateARandomCouponCode() {
        var randomCouponCode;
        randomCouponCode = randomString(4);
        $('#code').val(randomCouponCode);
    }

    function randomString(len) {
        var p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return [...Array(len)].reduce(a => a + p[~~(Math.random() * p.length)], '');
    }
</script>