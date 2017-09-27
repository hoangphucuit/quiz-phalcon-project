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
   <form method="post" action="dethi/mark">
	<script language="javascript">
    	var do_alert = function(){
        	$('form').submit();
         };
    	setTimeout(do_alert, 100000);
	</script>
	<div class="TieuDe">
		<h3 >Đề thi trắc nghiệm chứng chỉ sử dụng CNTT</h3>
	</div>
	<script>
		$(document).ready(function(){
			$('.radioo:checked').each(function() {
				console.log($(this).val());
			});
		});
	</script>           		 	
	<ol>
		<div class="panel panel-primary ">
			 
			<?php $question = $mangcauhoi; ?>
			<?php foreach ($question as $robot) { ?>
			
			<div class="panel-heading"><li class="question"><?= $robot->getQuestion() ?></li></div>
			<div class="panel-body">
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="A">A.
							<?= $robot->getAnswer1() ?> 
				</div>
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="B">B.
							<?= $robot->getAnswer2() ?> 
				</div>
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="C">C.
							<?= $robot->getAnswer3() ?> 
				</div>	
				<div class="radio">
					<input type="radio" class="radioo" name="<?= $robot->getId() ?>" id="<?= $robot->getId() ?>" value="D">D.
							<?= $robot->getAnswer4() ?> 
				</div>	
			</div>
			
			<?php } ?>
		</div>
<button type="button" class="btn btn-success " id="btn_check" name="btn_check">Check</button>
<button type="submit" class="btn btn-success" name="btn_submit">Success</button>
</ol>

</form>
<script>
$(document).ready(function(){
	$('#btn_check').click(function(){
		$('#modalcheck').modal('show');
		
	});
	$('#btn_sucess').click(function(){ 
		$('form').submit();
	});

});
</script>

<!-- modal-check -->
<div id="modalcheck" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
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