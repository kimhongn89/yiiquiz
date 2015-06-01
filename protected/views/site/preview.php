<div class='row'>
    <div class="col-md-12 text-center mb-30">
    <?php $i=1;$idx=0;?>
    <?php foreach ($rds as $rd):?>
        <button type="button" onclick='choose_preview(<?php echo $idx?>)' class="btn cus-btn btn-sm <?php if($rd->result == -1){echo 'btn-danger';}else{echo 'btn-success';}?>" >Question <?php echo $i?></button>
    <?php $i++;$idx++;?>
    <?php endforeach;?>
    </div>
    <hr/>
    <div class="col-md-12">
    	<button type="button" class="btn cus-btn btn-sm btn-danger">Not choose</button>
    	<button type="button" class="btn cus-btn btn-sm btn-success">Chosen</button>
    	
    </div>
</div>
