<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?= Html::a('Create Album', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_album',
    ]); ?>
    
</div>
