<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false" data-wap="true".>
<h3>Result <?php echo $result->id?></h3>
<div class="row">
    <div class='col-md-12'>
            <div class="availability">Name : <strong><?php echo $result->user->fullname ?></strong></div>
            <div class="availability">Start time : <strong><?php echo $result->start ?></strong></div>
            <div class="availability">End time : <strong><?php echo $result->end ?></strong></div>
    		<p>
    		<span class="label label-success">True : <?php echo $true['total']?></span>
    		<span class="label label-danger">False : <?php echo $fail['total']?></span>
    		<span class="label label-danger">Not choose : <?php echo $unchoose['total']?></span>
    		</p>
    		
    </div>
    <br>
    <div class="col-md-12 ">
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
                  <p class="ques_content <?php if($model->result != 1) echo 'error'?>" style="margin-bottom:15px;">Question <?php echo $i?> :<br><?php echo $model->question->content?></p>
                  </div>
                  <div class="answer">
                  <?php if($model->question->type == 1):?>
                        <?php foreach ($model->question->answers as $answer):?>
                            <div class="radio <?php if($model->result != 1 && $answer->result == 1) echo 'error'?>"><label><input  type="radio" class="rad_answer" <?php if($answer->id == $model->id_answer)echo 'checked'?> rel-quest='<?php echo $model->question->id?>' name="ques_<?php echo $model->question->id ?>" value="<?php echo $answer->id?>" ><?php echo CHtml::encode($answer->title);?></label></div>
                        <?php endforeach;?>   
                  <?php elseif($model->question->type == 2):?>
                        <?php $arr_choice=explode(',',$model->id_answer);?>
                        <?php foreach ($model->question->answers as $answer):?>
                          <div class="checkbox <?php if($model->result != 1 && $answer->result == 1) echo 'error'?>"><label><input  type="checkbox" class="chk_answer" <?php if(in_array($answer->id, $arr_choice))echo 'checked'?> rel-quest='<?php echo $model->question->id?>' name="chk_ques_<?php echo $model->question->id ?>[]" value="<?php echo $answer->id?>" ><?php echo CHtml::encode($answer->title);?></label></div>
                        <?php endforeach;?>
                  <?php elseif($model->question->type == 3):?>
                          <div class="textbox"><label><input  type="text" class="text_answer" rel-quest='<?php echo $model->question->id?>' name="ques_<?php echo $model->question->id ?>" value="<?php echo $model->text_answer?>"></label>
                          <p>Answer: <span class='error'><?php echo $model->question->short_answer ?></span></p>
                          </div>
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
          </div>
  </div>
</div>

</div>