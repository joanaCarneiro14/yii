<?php

use app\models\Desporto;
 
class DesportoCest 
{
     public function test01CriarDesporto(\FunctionalTester $I)
     {
         $I->amOnRoute('/desporto/create');
         $I->submitForm('form', [
             'Desporto[nome]' => 'Jogging',
             'Desporto[frequencia]' => '3',
             'Desporto[id_utilizador]' => '2',
         ]);
         $I->canSee('Jogging');
     }

     public function test02UpdateDesporto(\FunctionalTester $I)
     {
        $desporto = Desporto::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/desporto/update', ['id'=> $desporto->id]);
        $I->submitForm('form', [
            'Desporto[nome]' => 'Jogginging',
            'Desporto[frequencia]' => '3',
            'Desporto[id_utilizador]' => '2',
        ]);
        $I->canSee('Jogginging');
     }

     public function test03ListarDesporto(\FunctionalTester $I)
     {
        $I->amOnRoute('/desporto');
        $I -> canSee('Jogging');
     }

     public function test04DeleteDesporto(\FunctionalTester $I)
     {
        $desporto = Desporto::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/desporto/delete', ['id' => $desporto->id]);
        $I->amOnRoute('/desporto');
        $I->canSee('Jogging');
     
     }
 }