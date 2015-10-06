<?php
/**
 * 定义头部
 */
setcookie('LANGUAGE', 'Cn');
$tourists_id = Login::getTouristsId();

if ($tourists_id == null) {
    Login::setTouristsId();
}



