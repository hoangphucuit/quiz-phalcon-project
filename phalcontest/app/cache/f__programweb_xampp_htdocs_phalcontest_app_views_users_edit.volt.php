<section>

    <div style="padding: 10px;">
        <div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
        <div class="box box-info" style="padding-bottom: 20px;">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa thông tin user</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-warning" id="change_password">Đổi mật khẩu</a>
                </div>
            </div>
            <div class="box-body no-padding" style="width: 60%; margin: 0px auto;">
                <div class="" style="padding: 5px;">

                </div>
                <?= $this->tag->form(['method' => 'post', 'id' => '', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) ?>
                <?php foreach ($form as $element) { ?>
                <?php if ($element->getName() == 'password') { ?>
                <?php } elseif ($element->getName() == 'confirmpassword') { ?>
                <?php } else { ?>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label"><?= $element->getLabel() ?></label>

                    <div class="col-sm-9">
                        <?= $element->render() ?>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <div class="col-sm-offset-3" align="center">
                    <button class="btn btn-success">Sửa</button>
                    <a href="/users" class="btn btn-primary">Quay lại</a>
                </div>
                <?= $this->tag->endForm() ?>
            </div>
        </div>
    </div>

    <!-- Model for delete -->

    <div class="modal modal-success fade" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Đổi mật khẩu</h4>
        </div>
        <div class="modal-body">
            <div>
                <div class="form-group">
                    <label for="password">Mật khẩu mới:</label>
                    <div>
                        <input class="form-control" id="newpassword" type="password" placeholder="Mật khẩu mới"></input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Nhập lại mật khẩu:</label>
                    <div>
                        <input class="form-control" id="confirmpassword" type="password" placeholder="Nhập lại mật khẩu"></input>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="btn_change_password_modal" type="button" class="btn btn-outline pull-left" >Đổi</button>
            <button id="btn_cancel_modal" type="button" class="btn btn-outline" >Thoát</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->
</section>

<script type="text/javascript">

    $('input[id="username"]').attr("disabled",true);
    $('input[id="id"]').attr("disabled",true);

    var username = $('#username').val();

    //Button for modal
    $('#change_password').click(function(e){
        e.preventDefault();
        $('.modal').modal('show');
    });

    $('#btn_cancel_modal').click(function(){

        $('#newpassword').val("");
        $('#confirmpassword').val("");

        $('.modal').modal('hide');
    });

    $('form').submit(function(){
        var phone = $('#phone').val().toString();

        if(phone.indexOf("_") != -1){
            alert("Số điện thoại không hợp lệ");
            return false;
        }
    });

    $('#btn_change_password_modal').click(function(){
        var newpassword = $('#newpassword').val();
        var confirmpassword = $('#confirmpassword').val();

        if(newpassword != confirmpassword){
            alert("Nhập lại mật khẩu không khớp!");
        }else {
            $.ajax({
                url: "/users/changepassword",
                type: "POST",
                dataType: "text",
                data:
                {
                    username: username,
                    newpassword: newpassword
                },
                success: function(result){
                    if(parseInt(result) == 3){
                        alert("Đổi mật khẩu thành công");
                        $('#newpassword').val("");
                        $('#confirmpassword').val("");

                        $('.modal').modal('hide');
                    }
                    if(parseInt(result) == 2){
                        alert("Cập nhật mật khẩu bị lỗi");
                    }
                    if(parseInt(result) == 1){
                        alert("Dữ liệu không có");
                    }
                    if(parseInt(result) == 0){
                        alert("Xảy ra lỗi");
                    }
                }

            });
        }
    });

    //End Button for modal
</script>