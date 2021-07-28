<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutoriaPublicacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autoria Publicacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoria-publicacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autoria Publicacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_autor',
            'id_publicacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
