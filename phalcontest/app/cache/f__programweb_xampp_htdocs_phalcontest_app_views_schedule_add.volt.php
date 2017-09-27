<section>
	<div style="padding: 10px;">
		<div class="row">
			<?php echo $this->getContent(); ?>
			<?php echo $this->flashSession->output(); ?>
		</div>
		<div class="box box-info" style="padding-bottom: 20px;">
			<div class="box-header with-border">
			<h3 class="box-title">Tạo lịch thi </h3>
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
					<button class="btn btn-success" onclick='return testnumber()'>Thêm</button>
					<a href="/adcp/affiliates" class="btn btn-primary">Quay lại</a>
				</div>
				<?= $this->tag->endForm() ?>
				
			</div>
		</div>
	</div>

<script type="text/javascript">

function testnumber()
{
  var num=document.getElementById('numquestion').value;
  var num1=document.getElementById('nummodule1').value;
  var num2=document.getElementById('nummodule2').value;
  var num3=document.getElementById('nummodule3').value;
  var num4=document.getElementById('nummodule4').value;
  var num5=document.getElementById('nummodule5').value;
  var num6=document.getElementById('nummodule6').value;
  var num7=document.getElementById('nummodule7').value;
  var num8=document.getElementById('nummodule8').value;
  var num9=document.getElementById('nummodule9').value;
  var loaide = document.getElementById('cer_id').value;
  if(loaide=='NC')
  {
    if(Number(num)!=(Number(num7)+Number(num8)+Number(num9)))
    {
      alert('Số lượng câu hỏi là '+num+ ' vui lòng nhập đủ số lượng câu hỏi cho các module');
      return false;
    }
    return true;
  }
  if(loaide=='CB')
  {
    if(Number(num)!=(Number(num1)+Number(num2)+Number(num3)+Number(num4)+Number(num5)+Number(num6)))
    {
      alert('Số lượng câu hỏi là '+num+ ' vui lòng nhập đủ số lượng câu hỏi cho các module');
        return false;
    }
    return true;
  }
  alert('Vui lòng chọn loại đề');
  return false;
}

    
   $("#cer_id").change(function () {
  var loaide = $('#cer_id').val();

  if (loaide == 'CB') {
    $('#nummodule1').show();
    $('#nummodule2').show();
    $('#nummodule3').show();
    $('#nummodule4').show();
    $('#nummodule5').show();
    $('#nummodule6').show();
    $('#nummodule7').hide();
    $('#nummodule8').hide();
    $('#nummodule9').hide();
  }else 
  if (loaide == 'NC') {
    $("#nummodule1").hide();
    $('#nummodule2').hide();
    $('#nummodule3').hide();
    $('#nummodule4').hide();
    $('#nummodule5').hide();
    $('#nummodule6').hide();
    $('#nummodule7').show();
    $('#nummodule8').show();
    $('#nummodule9').show();
  }else{
  	$("#nummodule1").show();
    $('#nummodule2').show();
    $('#nummodule3').show();
    $('#nummodule4').show();
    $('#nummodule5').show();
    $('#nummodule6').show();
    $('#nummodule7').show();
    $('#nummodule8').show();
    $('#nummodule9').show();
  }
});
</script>

	
</section>