<?php
use app\models\Escola;
 class EscolaCest {
     public function test01CriarEscola(\FunctionalTester $I)
     {
         $I->amOnRoute('/escola/create');
         $I->submitForm('form', [
             'Escola[nome]' => 'xpto',
             'Escola[sigla]' => 'xpto',
             'Escola[id_instítuição]' => '1',
         ]);
         $I->canSee('xpto');
     }

     public function test02UpdateEscola(\FunctionalTester $I)
     {
        $escola = Escola::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/escola/update', ['id' => $escola->id]);
        $I->submitForm('form', [
            'Escola[nome]' => 'xptooo',
            'Escola[sigla]' => 'xpto',
            'Escola[id_instítuição]' => '1',
        ]);
        $I->canSee('xptooo');
     }

     public function test03ListarEscola(\FunctionalTester $I)
     {
        $I->amOnRoute('/escola');
        $I -> canSee('xpto');
     }

     public function test04DeleteEscola(\FunctionalTester $I)
     {
        $escola = Escola::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/escola/delete', ['id' => $escola->id]);
        $I->amOnRoute('/escola');
        $I->canSee('id');
     
     }
 }