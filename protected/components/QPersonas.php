<?php

class QPersonas {

    public static function getPersonas($sinDepa = true) {
        $where = "";
        if ($sinDepa) {
            $where = " AND u.id not in (SELECT ud.usuario_id FROM usuario_departamento ud  WHERE ud.estado = 1)";
        }

        $sql = "SELECT u.*, concat(u.nombres,' ',u.apellidos) as nombre_completo FROM usuario u 
                WHERE u.estado = 1" . $where;

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}
