<?php

class m190805_011413_add_evidencia_deuda extends CDbMigration {

    public function safeUp() {
        $this->alterColumn('deuda', 'monto', 'DECIMAL(10,2) NOT NULL');
        $this->addColumn('deuda', 'prueba', 'string AFTER tipo');
    }

    public function safeDown() {
        $this->alterColumn('deuda', 'monto', 'DECIMAL(10,0) NOT NULL');
        $this->dropColumn('deuda', 'prueba');
    }

}
