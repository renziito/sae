<?php

class m190803_220510_base_tables extends CDbMigration {

    public function safeUp() {
        $this->createTable('departamento', array(
            'id'     => 'pk auto_increment',
            'torre'  => 'string NOT NULL',
            'numero' => 'int NOT NULL',
            'estado' => 'boolean default TRUE',
        ));

        $this->createTable('usuario', array(
            'id'               => 'pk auto_increment',
            'username'         => 'string NOT NULL',
            'password'         => 'text NOT NULL',
            'nombres'          => 'text NOT NULL',
            'apellidos'        => 'text NOT NULL',
            'correo'           => 'string NOT NULL',
            'rol'              => 'string NOT NULL',
            'dni'              => 'string',
            'fecha_nacimiento' => 'date',
            'celular'          => 'string',
            'fecha_creacion'   => 'datetime default NOW()',
            'estado'           => 'boolean default TRUE',
        ));

        $this->insert('usuario', array(
            'username'  => 'sa',
            'password'  => password_hash('sa', PASSWORD_DEFAULT),
            'nombres'   => 'Super',
            'apellidos' => 'Administrador',
            'correo'    => 'sepia.aki@gmail.com',
            'rol'       => 'admin'
        ));

        $this->insert('usuario', array(
            'username'  => 'pibe',
            'password'  => password_hash('pibe', PASSWORD_DEFAULT),
            'nombres'   => 'Roberto',
            'apellidos' => 'Quezada',
            'correo'    => 'roberto@quezada.pe',
            'rol'       => 'admin'
        ));

        $this->createTable('usuario_departamento', array(
            'id'              => 'pk auto_increment',
            'departamento_id' => 'int NOT NULL',
            'usuario_id'      => 'int NOT NULL',
            'tipo'            => 'int NOT NULL',
            'personas'        => 'int NOT NULL',
            'mascotas'        => 'int NOT NULL',
            'estado'          => 'boolean default TRUE',
        ));

        $this->createTable('deuda', array(
            'id'                => 'pk auto_increment',
            'denominacion'      => 'string NOT NULL',
            'monto'             => 'decimal NOT NULL',
            'fecha_vencimiento' => 'date NOT NULL',
            'fecha'             => 'datetime default NOW()',
            'estado'            => 'boolean default TRUE',
        ));

        $this->createTable('usuario_deuda', array(
            'id'         => 'pk auto_increment',
            'deuda_id'   => 'int NOT NULL',
            'usuario_id' => 'int NOT NULL',
            'pagado'     => 'boolean default FALSE',
            'fecha_pago' => 'date NOT NULL',
            'fecha'      => 'datetime default NOW()',
            'estado'     => 'boolean default TRUE',
        ));

        $this->createTable('anuncio', array(
            'id'           => 'pk auto_increment',
            'titulo'       => 'string NOT NULL',
            'descripcion'  => 'text NOT NULL',
            'votacion'     => 'boolean default FALSE',
            'comentarios'  => 'boolean default TRUE',
            'fin_votacion' => 'date',
            'fecha'        => 'datetime default NOW()',
            'estado'       => 'boolean default TRUE',
        ));

        $this->createTable('anuncio_voto', array(
            'id'         => 'pk auto_increment',
            'anuncio_id' => 'int NOT NULL',
            'opcion'     => 'string NOT NULL',
            'monto'      => 'int',
            'fecha'      => 'datetime default NOW()',
            'estado'     => 'boolean default TRUE',
        ));

        $this->createTable('anuncio_votante', array(
            'id'              => 'pk auto_increment',
            'usuario_id'      => 'int NOT NULL',
            'anuncio_voto_id' => 'int NOT NULL',
            'fecha_voto'      => 'datetime',
            'estado'          => 'boolean default TRUE',
        ));

        $this->createTable('anuncio_comentario', array(
            'id'         => 'pk auto_increment',
            'usuario_id' => 'int NOT NULL',
            'anuncio_id' => 'int NOT NULL',
            'comentario' => 'text NOT NULL',
            'fecha'      => 'datetime default NOW()',
            'estado'     => 'boolean default TRUE',
        ));

        $this->createTable('kardex', array(
            'id'           => 'pk auto_increment',
            'tipo'         => 'int NOT NULL',
            'denominacion' => 'string NOT NULL',
            'monto'        => 'decimal NOT NULL',
            'prueba'       => 'string',
            'fecha_kardex' => 'datetime',
            'fecha'        => 'datetime default NOW()',
            'estado'       => 'boolean default TRUE',
        ));
    }

    public function safeDown() {
        $this->dropTable('departamento');
        $this->dropTable('usuario');
        $this->dropTable('usuario_departamento');
        $this->dropTable('deuda');
        $this->dropTable('usuario_deuda');
        $this->dropTable('anuncio');
        $this->dropTable('anuncio_voto');
        $this->dropTable('anuncio_votante');
        $this->dropTable('anuncio_comentario');
        $this->dropTable('kardex');
    }

}
