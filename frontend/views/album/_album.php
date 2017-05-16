<?php
/* @var $model frontend\models\Album */
use yii\helpers\Url;
?>

<div class="col-md-3 bg-info" style="margin-right: 20px; margin-bottom: 20px">
    
    <?php echo $model->name; ?>
    <br><br>
    
    <a href="<?php echo Url::to(['album/view', 'id' => $model->id]); ?>" class="btn btn-danger">View album</a>

    <?php if ($model->canUpdateBy(Yii::$app->user->id)): ?>
        <a href="<?php echo Url::to(['album/update', 'id' => $model->id]); ?>" class="btn btn-danger">Update</a>
    <?php endif; ?>

</div>

