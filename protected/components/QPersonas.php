<?php

class QPersonas {

    public static function getPersonas($id = false, $sinDepa = true) {
        if ($sinDepa) {
            $where = " AND u.id not in (
                    SELECT ud.usuario_id FROM usuario_departamento ud  WHERE
                    ud.estado = 1 AND (ud.hasta >='" . date('Y-m-d') . "'   
                        OR ud.hasta = '0000-00-00')
                    )";
        } else {
            $where = " AND u.id in (
                    SELECT ud.usuario_id FROM usuario_departamento ud  WHERE
                    ud.estado = 1 AND (ud.hasta <'" . date('Y-m-d') . "'   
                        OR ud.hasta != '0000-00-00')
                    )";
        }

        if ($id) {
            $where .= " AND u.id =" . $id;
        }

        $sql = "SELECT u.*, concat(u.nombres,' ',u.apellidos) as nombre_completo FROM usuario u 
                WHERE u.estado = 1" . $where;

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    public static function hadDeuda($deuda, $usuario) {
        $model = UsuarioDeuda::model()->count('estado = 1 AND usuario_id=' . $usuario . ' AND deuda_id = ' . $deuda);
        return $model;
    }

}
