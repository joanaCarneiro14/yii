<?php
use app\models\Utilizador;

 class UtilizadorCest {
        public function test01CriarUtilizador(\FunctionalTester $I)
        {
            $I->amOnRoute('/utilizador/create');
            $I->submitForm('form', [
            'Utilizador[password]' => '12101999',
            'Utilizador[tipo]' => 'docente',
            'Utilizador[email]' => 'fnfokod',
            ]);
            $I -> canSee('docente');
        }
        public function test02UpdateUtilizador(\FunctionalTester $I)
        {
           $utilizador = Utilizador::find()->orderBy(['id'=> SORT_DESC])->one();
           $I->amOnRoute('/utilizador/update', ['id' => $utilizador->id]);
           $I->submitForm('form', [
            'Utilizador[password]' => '12101999',
            'Utilizador[tipo]' => 'docente',
            'Utilizador[email]' => 'docentes@gmal',
            ]);
            $I -> canSee('docentes@gmal');
        }

        public function test03ListarUtilizador(\FunctionalTester $I)
        {
           $I->amOnRoute('/utilizador');
           $I -> canSee('docente');
        }

        public function test04DeleteUtilizador(\FunctionalTester $I)
        {
            $utilizador = Utilizador::find()->orderBy(['id'=> SORT_DESC])->one();
            $I->amOnRoute('/utilizador/delete', ['id' => $utilizador->id]);
            $I->amOnRoute('/utilizador');
            $I -> canSee('docentes');
        }

}