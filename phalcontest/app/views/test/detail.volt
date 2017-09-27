<section class="content">
    <div class="" style="padding: 10px;">
        <div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
        <form method="get" class="form-horizontal" action="">
            <!-- Form search start -->
            
            </div>
            <div class="btn-group">
                <a href="/test/exportexcel/{{code}}" class="btn btn-success">Xuất file Excel</a>

            </div>
            {% if page is defined %}
            <div class="" style="padding-top: 10px;">
                <div class="box box-danger">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã câu hỏi</th>
                                    <th class="check-all-toggle">
                                        <input type="checkbox" hidden=""></input>
                                        <i class="fa fa-square-o" title="Chọn toàn bộ"></i>
                                    </th>
                                    <th>Nội dung câu hỏi</th>
                                    <th>Đáp án A</th>
                                    <th>Đáp án B</th>
                                    <th>Đáp án C</th>
                                    <th>Đáp án D</th>
                                    <th>Đáp án Đúng</th>
                                    <th>Url hình ảnh</th>
                                    
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            {% set i = 0 %}
                                <?php foreach ($page->items as $item): ?>
                                    <tr>
                                        <td>{% set i = i + 1 %} {{i}}</td>
                                        <td><?php echo $item->ques_id ?></td>
                                        <td class="check-item-toggle">
                                            <input type="checkbox" hidden="" value="{{item.code}}" name="affiliates_check[]"></input>
                                            <i class="fa fa-square-o"></i>
                                        </td>
                                        <td>{{ item.Question.getQuestion() }}</td>
                                        <td><?php echo $item->A ?></td>
                                        <td><?php echo $item->B ?></td>
                                        <td><?php echo $item->C ?></td>
                                        <td><?php echo $item->D ?></td>
                                        <td><?php echo $item->correctanswer ?></td>
                                       
                                        <td>{{item.Question.getImage() }}</td>
                                        
                                
                                        <td></td>
                                       
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
                                    <li><?php echo $this->tag->linkTo("test/detail/$code", "First") ?></li>
                                    <li><?php echo $this->tag->linkTo("test/detail/$code?page=" . $page->before, "Previous") ?></li>
                                    <li><?php echo $this->tag->linkTo("test/detail/$code?page=" . $page->next, "Next") ?></li>
                                    <li><?php echo $this->tag->linkTo("test/detail/$code?page=" . $page->last, "Last") ?></li>
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

   



<script type="text/javascript">
    $(document).ready(function(){
        var item_check = "";
        var item_check_array = [];
        var delete_multi_item = false;
        var delete_item = false;




        /*Check all checkbox*/
        $('.check-all-toggle').click(function(){

            if($(this).children('input[type="checkbox"]').prop("checked") == false){
                $(this).children('input[type="checkbox"]').prop("checked",true);
                $(this).children('i').removeClass('fa-square-o').addClass('fa-check-square-o');

                $('tbody .check-item-toggle input[type="checkbox"]').prop("checked",true);
                $('tbody .check-item-toggle i').removeClass('fa-square-o').addClass('fa-check-square-o');

            }else{
                $(this).children('input[type="checkbox"]').prop("checked",false);
                $(this).children('i').removeClass('fa-check-square-o').addClass('fa-square-o');

                $('tbody .check-item-toggle input[type="checkbox"]').prop("checked",false);
                $('tbody .check-item-toggle i').removeClass('fa-check-square-o').addClass('fa-square-o');
            }
        });

        /*Check item checkbox*/
        $('tbody .check-item-toggle').click(function(){
            if($(this).children('input[type="checkbox"]').prop("checked") == false){
                $(this).children('input[type="checkbox"]').prop("checked",true);
                $(this).children('i').removeClass('fa-square-o').addClass('fa-check-square-o');
            }else{
                $(this).children('input[type="checkbox"]').prop("checked",false);
                $(this).children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
            }
        });

        

      
        
      

    });
</script>
</section>
