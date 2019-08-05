<?php

/**
 * Description of Menu
 *
 * @author renziito
 */
class Menu {

    public static function getMenu() {
        $menu = [
            [
                'name'  => 'Inicio',
                'link'  => Yii::app()->createurl('default'),
                'icon'  => 'fas fa-home',
                'class' => self::isActive([null, ['default'], 'index']),
                'admin' => false,
            ],
            [
                'name'  => 'Anuncios',
                'link'  => Yii::app()->createurl('default/anuncios'),
                'icon'  => 'fas fa-bullhorn',
                'class' => self::isActive([null, ['default'], 'anuncios']),
                'admin' => false,
            ],
            [
                'name'  => 'Mis Cuentas',
                'link'  => Yii::app()->createurl('default/cuentas'),
                'icon'  => 'fas fa-coins',
                'class' => self::isActive([null, ['default'], 'cuentas']),
                'admin' => false,
            ],
            [
                'name'  => 'Admin',
                'admin' => true,
                'link'  => 'javascript:;',
                'icon'  => 'fas fa-tools',
                'class' => self::isActive([['admin', 'deuda', 'anuncio', 'kardex'], ['*'], '*']),
                'sub'   => [
                    [
                        'name'  => 'Usuarios',
                        'icon'  => 'fas fa-users',
                        'class' => self::isActive(['admin', ['usuario'], '*']),
                        'link'  => Yii::app()->createurl('admin/usuario'),
                    ],
                    [
                        'name'  => 'Departamentos',
                        'icon'  => 'fas fa-building',
                        'class' => self::isActive(['admin', ['departamento'], '*']),
                        'link'  => Yii::app()->createurl('admin/departamento'),
                    ],
                    [
                        'name'  => 'Deudas',
                        'icon'  => 'fas fa-coins',
                        'class' => self::isActive(['deuda', ['default'], '*']),
                        'link'  => Yii::app()->createurl('deuda/default'),
                    ],
                    [
                        'name'  => 'Anuncios',
                        'icon'  => 'fas fa-bullhorn',
                        'class' => self::isActive(['anuncio', ['default'], '*']),
                        'link'  => Yii::app()->createurl('anuncio/default'),
                    ],
                    [
                        'name'  => 'Kardex',
                        'icon'  => 'fas fa-exchange-alt',
                        'class' => self::isActive(['kardex', ['default'], '*']),
                        'link'  => Yii::app()->createurl('kardex/default'),
                    ]
                ]
            ]
        ];
        return $menu;
    }

    public static function isActive($p) {
        $m   = (Yii::app()->controller->module ? Yii::app()->controller->module->id : '');
        $c   = (Yii::app()->controller->id == 'site' ? '' : Yii::app()->controller->id);
        $a   = ($c == '' && Yii::app()->controller->action->id == 'index' ? '' : Yii::app()->controller->action->id);
        $non = [];
        if (is_array($p[2])) {
            foreach ($p[2] as $act) {
                $temp = explode("!", $act);
                if (count($temp) > 1) {
                    $non[] = $temp[1];
                }
            }
        } else {
            $temp = explode("!", $p[2]);
            if (count($temp) > 1) {
                $non[] = $temp[1];
            }
        }

        if (count($non) > 1) {
            $action = !(in_array($a, $non));
        } else {
            $action = $a == $p['2'];
        }
        $module     = (is_array($p['0'])) ? in_array($m, $p['0']) : $m == $p['0'];
        $controller = (in_array($c, $p['1']) || in_array('*', $p['1']));

        $result = ($module && $controller) && ($p['2'] == '*' ? true : $action);
        return ($result ? 'open active' : '');
    }

}
