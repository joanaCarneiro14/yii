<?php
use app\models\Projeto;
 class ProjetoCest {
     public function test01CriarProjeto(\FunctionalTester $I)
     {
         $I->amOnRoute('/projeto/create');
         $I->submitForm('form', [
             'Projeto[titulo]' => 'XPTO',
             'Projeto[data_inicio]' => '2010-02-12',
             'Projeto[data_fim]' => '2010-02-12',
             'Projeto[local_realizacao]' => 'quintal',
             'Projeto[valor_financiado]' => '11',
         ]);
         $I->canSee('XPTO');
     }

     public function test02UpdateProjeto(\FunctionalTester $I)
     {
        $projeto = Projeto::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/projeto/update', ['id' => $projeto->id]);
        $I->submitForm('form', [
            'Projeto[titulo]' => 'XPTOOO',
            'Projeto[data_inicio]' => '2010-02-12',
            'Projeto[data_fim]' => '2010-02-12',
            'Projeto[local_realizacao]' => 'quintal',
            'Projeto[valor_financiado]' => '11',
        ]);
        $I->canSee('XPTOOO'); 
     }

     public function test03ListarProjeto(\FunctionalTester $I)
     {
        $I->amOnRoute('/projeto');
        $I -> canSee('XPTO');
     }

     public function test04DeleteProjeto(\FunctionalTester $I)
     {
        $projeto = Projeto::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/projeto/delete', ['id' => $projeto->id]);
        $I->amOnRoute('/projeto');
        $I->canSee('id');
     
     }
 }