<?php

class m190806_051033_add extends CDbMigration {

    public function safeUp() {
        $this->addColumn('usuario_departamento', 'desde', 'date AFTER tipo');
        $this->addColumn('usuario_departamento', 'hasta', 'date AFTER desde');
    }

    public function safeDown() {
        $this->dropColumn('usuario_departamento', 'desde');
        $this->dropColumn('usuario_departamento', 'hasta');
    }

}
