<?php

/**
 * 
 * 文件名称： ImgOperate.class.php
 * 创建日期： 12/24/2014 11:16:35 AM    	
 	
 * 功能说明： 验证码类
 * 作	者： coco
 * 版 本 号： 0.1
 * 
 * php缩略图函数：
 * 	等比例无损压缩，可填充补充色 
 *	param:
 *  @srcimage : 要缩小的图片
 *	@dstimage : 要保存的图片
 *	@dst_width: 缩小宽
 *	@dst_height: 缩小高
 *	@backgroundcolor: 补充色 如：#FFFFFF
 * 	
*/

class ImgOperate{
	
	private $srcimg;// 源图像
	private $dstimg;//目标图像
	private $src_width;// 源图像宽度
	private $src_height;// 源图像高度
	private $dst_width;//目标图像宽度
	private $dst_height;//目标图像高度
	private $backgroundcolor;//空白背景填充色
	private $dstimgname;//目标图像文件名
	private $dstimgpath; // 目标图像文件保存路径
	
	// 构造方法初始化
	public function __construct() {
	
		$this->backgroundcolor = '#ffffff' ;// 默认空白填充色白色
	
	}
	public function setSrcimg ($srcimg) {
	
		$this->srcimg = $srcimg ;
		echo "srcimg=>".$this->srcimg.'<br>';
	
	}
	
	//设定目标图像的大小
	public function setDstimgSize ($dst_width,$dst_height) {
	
		$this->dst_width= $dst_width ;
		$this->dst_height= $dst_height ;

	}
	//设定填充空白的颜色
	public function setFillColor ($color) {
		
		if(strlen($color)==7){
		$this->backgroundcolor= $color;
		}
		if(strlen($color)==4){
			
			$str=$color[0].$color[1].$color[1].$color[2].$color[2].$color[3].$color[3];		
			$this->backgroundcolor= $str;
		}
	}
	//安比例缩放之后填充空白
	private function createBg(){
		
		$this->dstimg = imagecreatetruecolor( $this->dst_width, $this->dst_height );
		$color = imagecolorallocate($this->dstimg
				, hexdec(substr($this->backgroundcolor, 1, 2))
				, hexdec(substr($this->backgroundcolor, 3, 2))
				, hexdec(substr($this->backgroundcolor, 5, 2))
		);
		imagefill($this->dstimg, 0, 0, $color);
		
	}
	
	private function createDstimage(){
	
		$arr=getimagesize($this->srcimg);
		$this->src_width = $arr[0];//获得原图宽
		$this->src_height = $arr[1];//获得原图高
		$dst_x = 0;
		$dst_y = 0;
		$dst_w = $this->dst_width;
		$dst_h = $this->dst_height;
		if ( ($this->dst_width / $this->dst_height - $this->src_width / $this->src_height) > 0 ) {
			$dst_w = $this->src_width * ($this->dst_height / $this->src_height );
			$dst_x = ( $this->dst_width - $dst_w ) / 2;
		} else if ( ($this->dst_width / $this->dst_height - $this->src_width / $this->src_height) < 0 ) {
			$dst_h = $this->src_height * ( $this->dst_width / $this->src_width );
			$dst_y = ( $this->dst_height - $dst_h ) / 2;
		}
		
		$imagres=imagecreatefromjpeg($this->srcimg);		
		imagecopyresampled($this->dstimg, $imagres, $dst_x	, $dst_y, 0, 0, $dst_w, $dst_h, $this->src_width, $this->src_height);
		
	}
	
	private function createDstimageName() {
		
		$str=explode('.', $this->srcimg );
		$this->dstimgname=$str[0].$this->dst_width.'x'.$this->dst_height;
		
	}
	
	
	private function savaDstimg() {
				
		imagejpeg($this->dstimg,$this->dstimgname.".jpg");
	    //imagedestroy($this->dstimg);
	    
	}
	
	public function getImg() {
		$this->createBg ();
		$this->createDstimage ();	
		$this->createDstimageName ();
		$this->savaDstimg();
	}
	
	
}


