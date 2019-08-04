<?php

class m190804_182937_change extends CDbMigration {

    public function safeUp() {
        $this->alterColumn('kardex', 'monto', 'DECIMAL(10,2) NOT NULL');
    }

    public function safeDown() {
        $this->alterColumn('kardex', 'monto', 'DECIMAL(10,0) NOT NULL');
    }

}
