<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_new_unit');  ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('create_new_unit'); ?></h4>

                    <form class="required-form" action="criarUnidade" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="discount_percentage"><?php echo get_phrase('city'); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="cidade" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount_percentage"><?php echo get_phrase('adress'); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="endereco" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount_percentage"><?php echo get_phrase('phone'); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="telefone" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount_percentage"><?php echo get_phrase('postal_code'); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="cep" required>

                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('create_unit'); ?></button>
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