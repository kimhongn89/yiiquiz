<div>
	<h1>
		<?php echo $quiz->title?>
	</h1>
	<hr>
	<p>The test contains <?php echo $quiz->no_of_question?> questions and time limit is <?php echo floor((int)$quiz->time/60) ." minute(s) ".(int)$quiz->time%60 ." second(s) "?> </p>
	<p>The test is not official, it's just a nice way to see how much you
		know, or don't know, about <?php echo $quiz->title?> skills.</p>
	<p>You will get 1 point for each correct answer. At the end of the
		Quiz, your total score will be displayed.</p>
	<h2>Start the Quiz</h2>
	<p>Good luck!</p>
	<?php $text_btn=$continue == true ? 'Continue':'Start'?>
	<?php echo CHtml::ajaxLink(
   '<button class="btn btn-warning btn-lg">'.$text_btn.'</button>', //display name of the link
   //url to our action populate list
   Yii::app()->createUrl('site/start'), 
   //array which contains ajax call information      
   array('type'=>'POST',           
      'dataType'=>'json',
      'data'=>'js:{ "ajax":true,"id":'.$quiz->id.' }',
         'success'=>'js:function(data){
                if(data.error == false){
                    $("#content").html(data.html);
                }else{
                    window.location.href="'.Yii::app()->createUrl('site/index').'"
                }
            }'
   ),
   array()
);
?>
</div>
<?php $cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
); ?>