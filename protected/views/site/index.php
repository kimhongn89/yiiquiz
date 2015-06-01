<h2>List Of Your Quiz:</h2>
<?php foreach ($models as $model):?>
<h3>
<?php
if (array_key_exists($model->id, $results)) {
    if($results[$model->id] == true)
        echo '<span>'.$model->title.'<span class="label label-success">Done</span>'.'</span>';
    else 
        echo CHtml::link($model->title,array('site/quiz','id' => $model->id)) . '<span class="label label-danger">uncompleted</span>';
}else{
    echo CHtml::link($model->title,array('site/quiz','id' => $model->id));
}
?>

</h3>
<?php endforeach;?>
