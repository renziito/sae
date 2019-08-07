<?php

class m190807_053845_modifica_fechapago extends CDbMigration {

    public function safeUp() {
        $this->alterColumn('usuario_deuda', 'fecha_pago', 'date null');
    }

    public function safeDown() {
        $this->alterColumn('usuario_deuda', 'fecha_pago', 'date NOT NULL');
    }

}
