<?php
/**
 * 返回语言标签
 * @param string $lang :语句
 * @param string $name :名称
 * @return string (Cn,Th)
 */
function fn_get_lang($lang,$name){
	$lang = strtolower($lang);
	$array = array(
			'cn' => array(
					'enable' => '-',
					'disable' => '已停用',
					'delete' => '已删除',
			),
			'th' => array(
					'enable' => '-',
					'disable' => 'ปิดตัวลง',
					'delete' => 'ที่ถูกลบ',
			),
	);
	
	return $array[$lang][$name];
}

