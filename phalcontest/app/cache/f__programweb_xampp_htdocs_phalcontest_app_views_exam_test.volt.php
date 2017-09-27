<style>
	.radio{
    margin-left: 50px;
}
	.question{
		margin-left: 20px;
	};
</style>
<div id="countdown" style="position:fixed;right:0;top:50px"></div>
<section class="content">

<div class="" style="padding: 10px;">

   <form method="post" action="/exam/mark">
	<script language="javascript">

    	var do_alert = function(){
        	jQuery('#btn_submit').click();
         };
         var 	timesubmit="<?= $thoiluongthi ?>";
         timesubmit=timesubmit-1;
    	setTimeout(do_alert, timesubmit*60*1000);

    	  


	</script>
	<div class="TieuDe">
		<h3 >Đề thi trắc nghiệm chứng chỉ sử dụng CNTT</h3>
	</div>
	
	<ol>
		<div class="panel panel-primary ">
			 
			<?php $question = $mangcauhoi; ?>
			<?php foreach ($question as $robot) { ?>
			
			<div class="panel-heading" id="<?= $robot->getId() ?>"><li class="question"><?= $robot->Question->getQuestion() ?></li></div>
			<?php if ($robot->Question->getImage() != null) { ?>
			<image src="<?= $robot->Question->getImage() ?>" style="width: 400px; height: 300px;" class="user-image" alt="Hình ảnh" >  
			<?php } ?>
			<div class="panel-body groupanswer" id=""  >

				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="A" >A.
							<?= $robot->getA() ?> 
				</div>
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="B" >B.
							<?= $robot->getB() ?> 
				</div>
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="C">C.
							<?= $robot->getC() ?> 
				</div>	
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="D">D.
							<?= $robot->getD() ?> 
				</div>	
			</div>
			<?php if ($robot->getAnswer() != null) { ?>
			<script>
			var id = "<?= $robot->getId() ?>";
			var ans ="<?= $robot->getAnswer() ?>"
			$('input[id='+id+'][value='+ans+']').prop("checked",true);
			</script>
			<?php } ?>
			<?php } ?>
		</div>
<div  class="text-center"><button type="button" class="btn btn-success btn-lg " id="btn_check" name="btn_check">Nộp bài</button></div>
<button type="submit" class="btn btn-success" id="btn_submit" name="btn_submit" style="display: none;">Success</button>
<button type="button" class="btn btn-danger btn-lg" id="btn_save" name="btn_save" style="position:fixed;right:350px;top:50px">Save</button>

</ol>

</form>

<script>
$(document).ready(function(){
	$('#btn_check').click(function(){
		$('#modalcheck').modal('show');
		
	});
	$('#btn_sucess').click(function(){ 
		jQuery('#btn_submit').click();
	});
		var 	time="<?= $thoiluongthi ?>";
	time=time-1;
	ts = (new Date()).getTime() + time*60*1000;

	$('#countdown').countdown({
		timestamp	: ts,});

	
});
</script>

<!-- modal-check -->
<div id="modalcheck" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body">
        <p>Bạn có muốn hoàn thành bài trắc nghiệm?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_sucess" >OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</section>

<script type="text/javascript" >

	$('#btn_save').click(function(){
		var arr_ques = [];
		var arr_ans = [];
		var sum_ques = "<?= $tongcauhoi ?>";
		$('.groupanswer').each(function(){
			
			  if($(this).find('input[type="radio"]:checked').length > 0)
			    {	
			    	arr_ques.push($(this).find('input[type="radio"]:checked').attr('name'));
			    	arr_ans.push($(this).find('input[type="radio"]:checked').attr('value'));
			     	var j=$(this).find('input[type="radio"]:checked').attr('name');	
			    	document.getElementById(j).style.background = 'green';  
			    }
			 
		});


			$.ajax({
			                url: "/exam/save",
			                type: "POST",			         
			                data:
			                {
			                    arr_ques: arr_ques,
			                    arr_ans: arr_ans
			                },
			                success: function(result){
			                        if(parseInt(result) != null){
                        				alert("Cập nhật số câu đã hoàn thành: " + " "+result+"/"+sum_ques+" câu");
                    				}			              
			                }

            		});
		
	});
	
  
    	
</script>