<section>

    <div style="padding: 10px;">
        <div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
        <div class="box box-info" style="padding-bottom: 20px;">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa câu hỏi</h3>
            </div>
            <div class="box-body no-padding" style="width: 60%; margin: 0px auto;">
                <div class="" style="padding: 5px;">

                </div>
                {{form('method':'post','id':'','enctype':'multipart/form-data','class':'form-horizontal')}}
                {% for element in form %}
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">{{element.getLabel()}}</label>

                    <div class="col-sm-9">
                        {{element.render()}}
                    </div>
                </div>
                {% endfor %}
                <div class="col-sm-offset-3" align="center">
                    <button class="btn btn-success">Sửa</button>
                    <a href="properties" class="btn btn-primary">Quay lại</a>
                </div>
                {{end_form()}}
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

    $('input[id="code"]').attr("disabled",true);
</script>