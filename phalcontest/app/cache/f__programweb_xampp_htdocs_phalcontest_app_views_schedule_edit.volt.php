<section>

    <div style="padding: 10px;">
        <div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
        <div class="box box-info" style="padding-bottom: 20px;">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa ca thi/ khóa thi</h3>
            </div>
            <div class="box-body no-padding" style="width: 60%; margin: 0px auto;">
                <div class="" style="padding: 5px;">

                </div>
                <?= $this->tag->form(['method' => 'post', 'id' => '', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) ?>
                <?php foreach ($form as $element) { ?>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label"><?= $element->getLabel() ?></label>

                    <div class="col-sm-9">
                        <?= $element->render() ?>
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-offset-3" align="center">
                    <button class="btn btn-success">Sửa</button>
                    <a href="properties" class="btn btn-primary">Quay lại</a>
                </div>
                <?= $this->tag->endForm() ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('input[id="id"]').attr("disabled",true);

        $('form').submit(function(){

        return true;
    });
    </script>
</section>
<script type="text/javascript">

    $('input[id="id"]').attr("disabled",true);
    $('input[id="numquestion"]').attr("disabled",true);
    $('input[id="cer_id"]').attr("disabled",true);
    $('input[id="nummodule1"]').attr("disabled",true);
    $('input[id="nummodule2"]').attr("disabled",true);
    $('input[id="nummodule3"]').attr("disabled",true);
    $('input[id="nummodule4"]').attr("disabled",true);
    $('input[id="nummodule5"]').attr("disabled",true);
    $('input[id="nummodule6"]').attr("disabled",true);
    $('input[id="nummodule7"]').attr("disabled",true);
    $('input[id="nummodule8"]').attr("disabled",true);
    $('input[id="nummodule9"]').attr("disabled",true);

</script>