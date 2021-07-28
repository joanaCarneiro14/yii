<?php
use app\models\Instituicao;
 class InstituicaoCest {
     public function test01CriarInstituicao(\FunctionalTester $I)
     {
         $I->amOnRoute('/instituicao/create');
         $I->submitForm('form', [
             'Instituicao[nome]' => 'IPB',
         ]);
         $I->canSee('IPB');
     }

     public function test02UpdateInstituicao(\FunctionalTester $I)
     {
        $instituicao = Instituicao::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/instituicao/update', ['id' => $instituicao->id]);
        $I->submitForm('form', [
            'Instituicao[nome]' => 'IPBB',
        ]);
        $I->canSee('IPBB');
     }

     public function test03ListarInstituicao(\FunctionalTester $I)
     {
        $I->amOnRoute('/instituicao');
        $I -> canSee('IPB');
     }

     public function test04DeleteInstituicao(\FunctionalTester $I)
     {
        $instituicao = Instituicao::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/instituicao/delete', ['id' => $instituicao->id]);
        $I->amOnRoute('/instituicao');
        $I->canSee('IPB');
     
     }
 }
 