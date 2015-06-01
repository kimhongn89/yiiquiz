<h1><?php echo $quiz->title?></h1>
<div class="col-md-10 ">
	<div class="contain_slide">
		<h3>Result</h3>
		<div class="availability">Name : <strong><?php echo Yii::app()->user->name ?></strong></div>
            <div class="availability">Start time : <strong><?php echo $rs->start ?></strong></div>
            <div class="availability">End time : <strong><?php echo $rs->end ?></strong></div>
    		<p>
    		<span class="label label-success">True : <?php echo $true['total']?></span>
    		<span class="label label-danger">False : <?php echo $fail['total']?></span>
    		<span class="label label-danger">Not choose : <?php echo $unchoose['total']?></span>
    		</p>
	</div>
</div>