<?php

class m190805_005850_change_tipo_deuda extends CDbMigration {

    public function safeUp() {
        $this->addColumn('deuda', 'tipo', 'int AFTER fecha_vencimiento');
    }

    public function safeDown() {
        $this->dropColumn('deuda', 'tipo');
    }

}
