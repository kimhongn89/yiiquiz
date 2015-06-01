<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false" data-wap="true".>
<h1><?php echo $quiz->title?></h1>
<div class="col-md-10 ">
	<div class="contain_slide">
		<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php $i=1;?>
  <?php foreach ($models as $model):?>
    <div class="item <?php if ($i==1) echo 'active'?>">
      <div class="question">
      <h3>Category: <span style="text-transform: uppercase;"><?php echo $model->question->category->title?></span></h3>
      </div>
      
      <div class="question">
      <p class="ques_content" style="margin-bottom:15px;">Question <?php echo $i?> :<br><?php echo $model->question->content?></p>
      </div>
      <div class="answer">
      <?php if($model->question->type == 1):?>
            <?php foreach ($model->question->answers as $answer):?>
              <div class="radio"><label><input  type="radio" class="rad_answer" <?php if($answer->id == $model->id_answer)echo 'checked'?> rel-quest='<?php echo $model->question->id?>' name="ques_<?php echo $model->question->id ?>" value="<?php echo $answer->id?>" ><?php echo CHtml::encode($answer->title);?></label></div>
            <?php endforeach;?>   
      <?php elseif($model->question->type == 2):?>
            <?php $arr_choice=explode(',',$model->id_answer);?>
            <?php foreach ($model->question->answers as $answer):?>
              <div class="checkbox"><label><input  type="checkbox" class="chk_answer" <?php if(in_array($answer->id, $arr_choice))echo 'checked'?> rel-quest='<?php echo $model->question->id?>' name="chk_ques_<?php echo $model->question->id ?>[]" value="<?php echo $answer->id?>" ><?php echo CHtml::encode($answer->title);?></label></div>
            <?php endforeach;?>
      <?php elseif($model->question->type == 3):?>
              <div class="radio"><label><input  type="text" class="text_answer" rel-quest='<?php echo $model->question->id?>' name="ques_<?php echo $model->question->id ?>" value="<?php echo $model->text_answer?>"></label></div>
      <?php endif;?>
      
      </div>
    </div>
    <?php $i++;?>
    <?php endforeach;?>
  </div>
	</div>
  <div class="control pull-left" style="position:relative">
    <!-- Controls -->
  <a class="" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="label label-primary">Previous</span>
  </a>
  <a class="" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="label label-primary">Next</span>
  </a>
  <a id='previewQuiz'  href="javascript:void(0)">
    <span class="label label-info">Preview</span>
  </a>
  <a id='endQuiz' href="javascript:void(0)">
    <span class="label label-danger">End Quiz</span>
  </a>
  </div>
  <div class='timer pull-right'>
        Time left: <span id="timer"></span>
  </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Preview Question</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<script>
 $(document).ready(function(){
	 //countdown
	 var time = <?php echo $timer?>,
	 display = $('#timer');
	 startTimer(time, display);

	 //show preview
	 $('#previewQuiz').on('click', function () {
		 $('#myModal').modal();
		 $('#myModal .modal-body').html('<div class="text-center"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/ajax-modal-loading.gif", "Loading"); ?></div>')
		 url="<?php echo Yii::app()->createUrl("site/loadPreview",array('rs'=>$rsID)) ?>";
			$.ajax({
				url: url,
				type: 'GET',
				}).done(function(res) {
					$('#myModal .modal-body').html(res);
				});
		})
	//prevent f5
	$(window).on('beforeunload',function(event){
		return "Do you want to exit";
		});
	//choose answer type 1
	$('input:radio[class=rad_answer]').change(function() {
		var question =$(this).attr('rel-quest');
		var answer =$(this).val();
		var data={question:question,answer:answer};
		sendAnswer(data);
        });
	//choose answer type 2
	$('input:checkbox[class="chk_answer"]').change(function() {
		var question =$(this).attr('rel-quest');
	    var chk_name=$(this).attr('name');
		var arr_answer = [];
		$("input[name='"+chk_name+"']:checked").each(function(i) {
			arr_answer.push($(this).val());
		});
		var data={question:question,answer:arr_answer};
        sendAnswer(data);
        });
	//choose answer type 3
	$('input:text[class="text_answer"]').blur(function() {
		var question =$(this).attr('rel-quest');
	    var answer=$(this).val();
	    var data={question:question,answer:answer};
		sendAnswer(data);
        });
    //end quiz
    $('#endQuiz').click(function(){
    	swal({
			  title: "Are you sure?",
			  text: "Do you want to end this Quiz!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, i do!",
			  closeOnConfirm: false
			},
			function(){
				swal.close();
				url="<?php echo Yii::app()->createUrl("site/endQuiz",array('rs'=>$rsID)) ?>";
				$.ajax({
					url: url,
					type: 'POST',
					}).done(function(res) {
						clearInterval(handle);
						$('#content').html(res);
					});
			});
    })
}); 
 function startTimer(duration, display) {
	    var timer = duration, minutes, seconds;
	    handle = setInterval(function () {
	        minutes = parseInt(timer / 60, 10)
	        seconds = parseInt(timer % 60, 10);
	        minutes = minutes < 10 ? "0" + minutes : minutes;
	        seconds = seconds < 10 ? "0" + seconds : seconds;
	        display.text(minutes + ":" + seconds);
	        if (--timer < 0) {
	        	clearInterval(handle);
	        	$('#myModal').modal('hide');
	        	endQuiz();
	        }
	    }, 1000);
	}

	function sendAnswer(data){
		var url ='<?php echo Yii::app()->createUrl("site/saveChoice",array('rs'=>$rsID))?>';
        $.ajax({
			url: url,
			type: 'POST',
			data:data,
			dataType : 'json',
			}).done(function(res) {
				if(res==0){
					clearInterval(handle);
					endQuiz();    
				}
			});
	}
	function endQuiz(){
		swal({
	  		  title: "Timeout",
	  		   type: "warning",
	  		  text: "The result will show in 5 seconds.",
	  		  timer: 5000,
	  		  showConfirmButton: false
	  		});
			url="<?php echo Yii::app()->createUrl("site/endQuiz",array('rs'=>$rsID)) ?>";
			$.ajax({
				url: url,
				type: 'POST',
				}).done(function(res) {
					setTimeout(function(){
					$('#content').html(res);
					},5000);
				});
	}
	//choose preview
	function choose_preview(idx){
		$(".carousel-inner div.item").removeClass('active');
		var target=$(".carousel-inner div.item").get(idx);
		$(target).addClass('active');
		$('#myModal').modal('hide');
    }
</script>