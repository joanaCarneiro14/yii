<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diretor */

$this->title = 'Create Diretor';
$this->params['breadcrumbs'][] = ['label' => 'Diretors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
