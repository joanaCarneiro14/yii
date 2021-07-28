<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DesportoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Desportos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desporto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Desporto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'frequencia',
            'id_utilizador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
