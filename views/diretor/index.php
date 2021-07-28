<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiretorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diretors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diretor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diretor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_docente',
            'id_escola',
            'data_inicio',
            'data_fim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
