<?php
/**
 * 文件上传
 * @author xx
 *
 */
class Upload{
	private $_width 		= 800;		//窗口宽度
	private $_height		= 600;		//窗口高度
	private $_multi		= 	true;		//是否多选

	/**
	 * 显示对话窗口
	 * @param unknown $param
	 */
	public function show() {
		$str = $this->dialog().$this->javascript();
		return $str;
	}
	/**
	 * 是否多选
	 */
	public function setMulti($multi){
		$this->_multi = $multi;
	}
	private function dialog () {
		$str ='<div id="vcb_dialog" title="文件上传">		
				<div><ul id="vcb_dialog_filelist"></ul> </div>
				<div id="vcb_dialog_bar"></div>
			</div>';
		return $str;
	}
	/**
	 * 文件上传
	 * @param string $dir :目录名称
	 * @return string 上传后路径
	 */
	function save($dir) {
		if (! empty ( $_FILES )) {
			$tempFile = $_FILES ['Filedata'] ['tmp_name'];
			$uploadPath = $_SERVER ['DOCUMENT_ROOT'] . M_UPLOAD_PATH;
			$targetPath = $dir.'/';
			$year = date ( 'Y', time () );
			$month = gmdate ( 'm', time () );
			$day = gmdate ( 'd', time () );
	
			// 按年，月，日建立文件夹
			$targetPath .= $year . '/';
			if (! file_exists ( $uploadPath . $targetPath )) {
				mkdir ( $uploadPath . $targetPath );
			}
			$targetPath .= $month . '/';
			if (! file_exists ( $uploadPath . $targetPath )) {
				mkdir ( $uploadPath . $targetPath );
			}
			$targetPath .= $day . '/';
			if (! file_exists ( $uploadPath . $targetPath )) {
				mkdir ( $uploadPath . $targetPath );
			}
	
			$fileParts = pathinfo ( $_FILES ['Filedata'] ['name'] );
			$fileExt = strtolower ( $fileParts ['extension'] );
	
			$name = time () . rand ( 1000, 9999 ) . '.' . $fileExt; // 文件名
			$targetFile = $uploadPath . $targetPath . '/' . $name;
	
			$ext = array (
					'jpg',
					'jpeg',
					'gif',
					'png'
			); // 只可上传文件类型
			if (in_array ( strtolower ( $fileParts ['extension'] ), $ext )) {
				move_uploaded_file ( $tempFile, $targetFile );
				return $targetPath . '/' . $name;
			} else {
				return  null;
			}
		}
	}
	
	private function javascript() {
		$str ='<script type="text/javascript">
		$( \'#vcb_dialog\' ).dialog({
			autoOpen: false,
		    height: 600,
		    width: 850,
		    modal: true,
			buttons: [
				  		{
				  			text: \'上传图片\',
				  			id:\'vcb_dialog_upload\',
				  			click: function() {		  				
				  			}
				  		},
				  		{
				  			text: \'确定\',
				  			click: function() {
								vcb_dialog_upload();
				  				document.getElementById(\'vcb_dialog_filelist\').innerHTML="";
				  				$( this ).dialog( "close" );
				  			}
				  		},
				  		{
				  			text: \'取消\',
				  			click: function() {
				  				document.getElementById(\'vcb_dialog_filelist\').innerHTML="";
				  				$( this ).dialog( "close" );
				  			}
				  		}
				  	]
		});
		
		$(function() {
			$(\'#vcb_dialog_upload\').uploadify({
				"swf"      		: "'.JS_PUBLIC_PATH.'uploadify/uploadify.swf",
				"uploader" 		: "upload",
				"fileTypeExts"  : "*.gif; *.jpg; *.png",
				"multi"			: true,
				"buttonText"	:"上传图片",
				"height"        : 35,
				"width"			:120,
				"sizeLimit" 	: 102400,		
				"removeTimeout"	:1,
				"queueID" 		:"vcb_dialog_bar",
			    "onUploadSuccess" : function(file, data, response) {  
					    var url = \''.M_UPLOAD_URL.'\'+data;
					    var s=document.getElementById(\'vcb_dialog_filelist\');
					    var v = \'<input type="hidden" name="vcb_dialog_filename" id="vcb_dialog_filename" value="\'+data+\'"/>\';
					    s.innerHTML+=\'<li><img src="\'+url+\'"  height="90" />\'+v+\'</li>\';
			 }
			});
		});
		</script>';
		
		return $str;
	}
}