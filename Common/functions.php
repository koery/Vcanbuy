<?php
/**
 * 返回语言符号(首字母大写)
 * @return string (Cn,Th)
 */
function get_lang(){
	if (!isset($_GET['lang'])){
		return '';
	}
	else{
		$lang = strtolower(trim($_GET['lang']));
		if (in_array($lang, array('cn','th') )) {
			return ucfirst($lang);
		}
		else{
			return '';
		}
	}
}
/**
 * 返回当前页码
 * @return int
 */
function get_current_page(){
	if (!isset($_GET['page']) || !is_numeric($_GET['page'])){
		return 0;
	}
	else{
		$page =$_GET['page'];
		if ($page >0){
			return intval($page);
		}
		else{
			return 0;
		}
	}
}

/**
 * 返回Post/GET值 
 * @param string $field 列名
 * @return string 
 */
function get_post_value($field){
	if (isset($_POST[$field])){
		return $_POST[$field];
	}else if (isset($_GET[$field])){
		return $_GET[$field];
	}
	else{
		return '';
	}
	
	
}
/**
 * json数据 转换 数组
 */
function object_array($array)
{
	if(is_object($array))
	{
		$array = (array)$array;
	}
	if(is_array($array))
	{
		foreach($array as $key=>$value)
		{
			$array[$key] = object_array($value);
		}
	}
	return $array;
}

/**
 * 淘宝url中获取id值
 */
function getQuerystr($url,$key)
{
	$res = '';
	$a = strpos($url,'?');
	if($a!==false)
	{
		$str = substr($url,$a+1);
		$arr = explode('&',$str);
		foreach($arr as $k=>$v)
		{
			$tmp = explode('=',$v);
			if(!empty($tmp[0]) && !empty($tmp[1]))
			{
				$barr[$tmp[0]] = $tmp[1];
			}
		}
	}
	if(!empty($barr[$key]))
	{
		$res = $barr[$key];
	}
	return $res;
}
/**
 * 保存图片
 */
function get_file($url,$folder,$pic_name)
{
	set_time_limit(24*60*60);
	$destination_folder=$folder?$folder.'/':'';
	$newfname=$destination_folder.$pic_name;
	$file=fopen($url,'rb');
	if(!file_exists($file))
	{
		mkdir ($destination_folder);
	}
	if($file)
	{
		$newf=fopen($newfname,'wb');
		if($newf)
		{
			while(!feof($file))
			{
				fwrite($newf,fread($file,1024*8),1024*8);
			}
		}
		if($file)
		{
			fclose($file);
		}
		if($newf)
		{
			fclose($newf);
		}
	}
}