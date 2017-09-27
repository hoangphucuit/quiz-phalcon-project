

<section class="content">
<div class="" style="padding: 10px;">
   <form method="post" action="#">
	<script language="javascript">
    	var do_alert = function(){
        	$('form').submit();
         };
    	/*setTimeout(do_alert, 100000);*/
	</script>
	<div class="TieuDe">
		<h3 >Đề thi thực hành chứng chỉ sử dụng CNTT</h3>
	</div>
	   		 	
	<ol>
		<div class="panel panel-primary ">
			 
			{% set question=manglab %}
			{% for robot in question %}
			
			<div class="panel-heading"><li>{{ robot.getQuestionlab() }}</li></div>
			<div>Giáo viên phát đề</div>
			
			{% endfor %}
		</div>

</ol>

</form>

</section>