<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\facility */

$this->title = 'Update Facility: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'checklist_id' => $model->checklist_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facility-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
