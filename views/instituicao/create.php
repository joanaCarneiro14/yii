<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = 'Create Instituicao';
$this->params['breadcrumbs'][] = ['label' => 'Instituicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituicao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
