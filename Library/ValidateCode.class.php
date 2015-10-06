<?php
/**
 * 文件名称： ValidateCode.class.php
 * 创建日期： 2014.12.2
 * 功能说明： 验证码类
 * 作	者： coco
 * 版 本 号： 1.0
 */
class ValidateCode {
	private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789'; // 随机因子  除去0,1,l,o,i
	private $code; // 验证码
	private $codelen = 4; // 验证码长度
	private $width = 88; // 宽度
	private $height = 36; // 高度
	private $img; // 图形资源句柄
	private $font; // 指定的字体
	private $fontsize = 19; // 指定字体大小
	private $fontcolor; // 指定字体颜色
	 // 构造方法初始化
	public function __construct() {
		
		$this->font = ROOT.FONTS_PUBLIC_PATH.'slapstick Comic.ttf'; // 默认字体 注意字体路径要写对，否则显示不了图片
		
	}
	
	
	/**
	 * 查看基本参数
	 * @access public
	 * @return
	 */
	public function getInfo(){
	    $info="基本参数：";
		if(isset($this->codelen))
		$info .="<br/>验证码长度：".$this->codelen;
		if(isset($this->font))
			$info .="<br/>验证码字体：".$this->font;
		if(isset($this->fontsize))
			$info .="<br/>验证码大小：".$this->fontsize;
		if(isset($this->width))
			$info .="<br/>图片宽度：".$this->width;
		if(isset($this->heigh))
			$info .="<br/>图片宽度：".$this->heigh;
		return $info;
	}
	
	/**
	 * 验证码位数
	 * @access public
	 * @param  int 
	 */
	public function setCodelen($codelen){
		
			$this->codelen=$codelen;
	}
	
	/**
	 * 字体大小
	 * @access public
	 * @param  int
	 */
	public function setFontSize($fontsize){
	
		$this->fontsize=$fontsize;
	}
	
	
	
	/** 图片大小设置
	* @access public
	* @param  float float
	*/
	public function setSize($width,$height){
		
			$this->width=$width;
			$this->height=$height;
	}
	
	/**
	 * 字体设置
	 * @access public
	 * @param  string 
	 */
	public function setFonts($font){
		if(is_file($font))
			$this->font=ROOT.APP_MODULE_FONTS_PATH.$font;
		
	}
	
	
	// 生成随机码
	private function createCode() {
		$_len = strlen ( $this->charset ) - 1;
		for($i = 0; $i < $this->codelen; $i ++) {
			$this->code .= $this->charset [mt_rand ( 0, $_len )];
		}
	}
	// 生成背景
	private function createBg() {
		$this->img = imagecreatetruecolor ( $this->width, $this->height );
		$color = imagecolorallocate ( $this->img, mt_rand ( 255, 255 ), mt_rand ( 255, 255 ), mt_rand ( 255, 255 ) );
		imagefilledrectangle ( $this->img, 0, $this->height, $this->width, 0, $color );
	}
	// 生成文字
	private function createFont() {
		$_x = $this->width / $this->codelen-2;
		for($i = 0; $i < $this->codelen; $i ++) {
			$this->fontcolor = imagecolorallocate ( $this->img, mt_rand ( 0, 130 ), mt_rand ( 0, 130 ), mt_rand ( 0, 130 ) );
			imagettftext ( $this->img, $this->fontsize, mt_rand ( - 30, 30 ), $_x * $i + 8 , $this->height / 1.4, $this->fontcolor, $this->font, $this->code [$i] );
		}
	}
	// 生成线条、雪花
	private function createLine() {
		// 线条
		for($i = 0; $i < 6; $i ++) {
			$color = imagecolorallocate ( $this->img, mt_rand ( 0, 156 ), mt_rand ( 0, 156 ), mt_rand ( 0, 156 ) );
			imageline ( $this->img, mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), $color );
		}
		// 雪花
		for($i = 0; $i < 100; $i ++) {
			$color = imagecolorallocate ( $this->img, mt_rand ( 200, 255 ), mt_rand ( 200, 255 ), mt_rand ( 200, 255 ) );
			imagestring ( $this->img, mt_rand ( 1, 5 ), mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), '*', $color );
		}
	}
	// 输出
  	private function outPut() {
 		header ( 'Content-type:image/png' );
		imagepng ( $this->img );
 		imagedestroy ( $this->img );
 	}
	// 对外生成
	public function getCodeImg() {
		$this->createBg ();
		$this->createCode ();
		//$this->createLine ();
		$this->createFont ();
		
		$this->outPut();
	}
	// 获取验证码
	public function getCode() {
		return strtolower ( $this->code );
	}
}
