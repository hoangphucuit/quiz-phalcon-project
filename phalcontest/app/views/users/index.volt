<section class="content">
    <div class="" style="padding: 10px;">
        <div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
        <form method="get" class="form-horizontal" action="users">
            <!-- Form search start -->
            <div class="box box-info">
                <!-- box header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Tìm kiếm</h3>
                </div>
                <!-- box body -->
                <div class="box-body">
                    <div class="form-group col-md-6">
                        <label for="" class="col-md-4 control-label">Họ và tên:</label>

                        <div class="col-md-8">
                            {{form.render('name', ['class':'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-md-4 control-label">Email:</label>

                        <div class="col-md-8">
                            {{form.render('mail', ['class':'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="col-md-offset-4 col-md-8">
                            <input class="btn btn-primary" type="submit" value="Tìm"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <a href="users/add" title="Thêm" class="btn btn-success"><i class="fa fa-plus"></i></a>
                <a href="#" title="Xóa nhiều dòng" class="btn btn-danger delete-item-check-table"><i
                    class="fa fa-trash "></i></a>
                </div>
                {% if page is defined %}
                <div class="" style="padding-top: 10px;">
                    <div class="box box-danger">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th class="check-all-toggle">
                                            <input type="checkbox" hidden=""/>
                                            <i class="fa fa-square-o" title="Chọn toàn bộ"></i>
                                        </th>
                                        <th>Họ và tên</th>
                                        <th>Username</th>
                                        <th>Quyền</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% set i = 0 %}
                                    <?php foreach ($page->items as $item): ?>
                                        <tr>
                                            <td>{% set i = i + 1 %} {{i}}</td>
                                            <td class="check-item-toggle">
                                                <input type="checkbox" hidden="" value="{{item.id}}"
                                                name="user_check[]"/>
                                                <i class="fa fa-square-o"></i>
                                            </td>
                                            <td><?php echo $item->fullname ?></td>
                                            <td><?php echo $item->username ?></td>
                                            <td><?php echo $item->role ?></td>
                                            <td><?php echo $item->mail ?></td>
                                            <td><?php if ($item->status == "0") {
                                                echo "Ẩn";
                                            } elseif ($item->status == "1") {
                                            echo "Hoạt động";
                                        } else {
                                        echo $item->status;
                                    } ?></td>
                                    <td></td>
                                     <td><a href="/users/edit/{{item.id}}"
                                     class="fa fa-edit btn btn-primary btn-sm" title="Sửa"></a> <a href="/users/delete/{{item.id}}"
                                         class="fa fa-trash btn btn-danger btn-sm delete-item-table" title="Xóa"></a></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                     <div class="box box-footer">
                        <div class="col-sm-1">
                            <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
                                <?php echo $page->current, "/", $page->total_pages ?>
                            </p>
                        </div>
                        <div class="col-sm-11">
                            <nav>
                                <ul class="pagination">
                                    <li><?php echo $this->tag->linkTo("users", "First") ?></li>
                                    <li><?php echo $this->tag->linkTo("users?page=" . $page->before, "Previous") ?></li>
                                    <li><?php echo $this->tag->linkTo("users?page=" . $page->next, "Next") ?></li>
                                    <li><?php echo $this->tag->linkTo("users?page=" . $page->last, "Last") ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}
        </form>
    </div>

    <!-- Model for delete -->

    <div class="modal modal-danger fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Thông báo</h4>
                    </div>
                    <div class="modal-body">
                        <p>Bạn muốn xóa user?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btn_cancel_modal" type="button" class="btn btn-outline pull-left" data-dismiss="modal">
                            Đóng
                        </button>
                        <button id="btn_delete_modal" type="button" class="btn btn-outline">Xóa</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <script type="text/javascript">
            var item_check = "";
            var item_check_array = [];
            var delete_multi_item = false;
            var delete_item = false;


            /*Check all checkbox*/
            $('.check-all-toggle').click(function () {

                if ($(this).children('input[type="checkbox"]').prop("checked") == false) {
                    $(this).children('input[type="checkbox"]').prop("checked", true);
                    $(this).children('i').removeClass('fa-square-o').addClass('fa-check-square-o');

                    $('tbody .check-item-toggle input[type="checkbox"]').prop("checked", true);
                    $('tbody .check-item-toggle i').removeClass('fa-square-o').addClass('fa-check-square-o');

                } else {
                    $(this).children('input[type="checkbox"]').prop("checked", false);
                    $(this).children('i').removeClass('fa-check-square-o').addClass('fa-square-o');

                    $('tbody .check-item-toggle input[type="checkbox"]').prop("checked", false);
                    $('tbody .check-item-toggle i').removeClass('fa-check-square-o').addClass('fa-square-o');
                }
            });


            /*Check item checkbox*/
            $('tbody .check-item-toggle').click(function () {
                if ($(this).children('input[type="checkbox"]').prop("checked") == false) {
                    $(this).children('input[type="checkbox"]').prop("checked", true);
                    $(this).children('i').removeClass('fa-square-o').addClass('fa-check-square-o');
                } else {
                    $(this).children('input[type="checkbox"]').prop("checked", false);
                    $(this).children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                }
            });

    //Delete multi item by checkbox
    $('.delete-item-check-table').click(function (e) {
        e.preventDefault();


        //Get multi value by checkbox
        var i = 0;
        $('tbody .check-item-toggle input[type="checkbox"]:checked').each(function () {
            item_check_array[i++] = $(this).val();
        });

        //Display modal if checkbox checked
        if (item_check_array.length != 0) {
            $('.modal').modal('show');
            delete_multi_item = true;
        }
    });

    //Delete an item
    $('.delete-item-table').click(function (e) {
        e.preventDefault();
        $('.modal').modal('show');
        item_check = $(this).attr("href");
        delete_item = true;
    });

    /*Button for modal*/
    $("#btn_delete_modal").click(function () {
        if (delete_multi_item == true) {
            window.location.href = "users/deleteMultiCheck/" + item_check_array.toString();
        }
        if (delete_item == true) {
            window.location.href = item_check;
        }


    });

    $("#btn_cancel_modal").click(function () { //Default value
        item_check = "#";
        item_check_array = [];
        delete_item = false;
        delete_multi_item = false;
    });

</script>
</section>