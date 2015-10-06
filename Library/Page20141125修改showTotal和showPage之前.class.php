<?php
/**
 *  分页
 */
class Page{
	
	public $firstRow; 			// 起始行数
	public $listRows; 			// 列表每页显示行数
	public $parameter; 			// 分页跳转时要带的参数
	public $totalRows; 			// 总行数
	public $totalPages; 		// 分页总页面数
	public $rollPage   	= 11;	// 分页栏每页显示的页数
	public $lastSuffix 	= true; // 最后一页是否显示总页数
	
	private $p       	= 'p'; 	//分页参数名
	private $_url     	= ''; 	//当前链接URL
	private $_currentPage	= 1;	//当前页		

	/**
	 * 架构函数
	 * @param array $totalRows  总的记录数
	 * @param array $listRows  每页显示记录数
	 * @param array $parameter  分页跳转的参数
	 */
	public function __construct($totalRows, $listRows = null, $parameter = array()) {
 		/* 基础设置 */
		$this->_url		  	= CURRENT_URL ;
		$this->totalRows  	= $totalRows; //设置总记录数
		$this->listRows   	= !isset($listRows) ? DEFAULT_LIMIT : $listRows; // 设置每页显示行数
		$this->parameter = empty ( $parameter ) ? '' : $parameter;
		$this->_currentPage	= get_current_page();
		$this->_currentPage = $this->_currentPage >0 ? $this->_currentPage :1;
		
	}
	/**
	 * 析构函数
	 */
	public function __destruct(){
		unset($this->firstRow);
	}
	/**
	 * 设置参数
	 * @param array $parameter  参数
	 */
	public function setParameter($parameter ){
		$this->parameter = $parameter;
	}
	/**
	 * 设置每页显示行数
	 * @param array $parameter  参数
	 */
	public function setListRows($listRows){
		$this->listRows   	= $listRows;  
	}
	/**
	 * 组装分页链接
	 * @return string
	 */
	public function showPage() {
		if($this->totalRows ==0 || $this->listRows ==0) return '';
			
			// URL设置
		if (!strpos ( $this->_url, '?' ) ){
		$this->_url .= '?' . $this->parseParameter ();
		}
		else
		{
			$this->_url .= $this->parseParameter ();
		}
		if (strpos ( $this->_url, '?' ) ) {
			$this->_url .= '&page=';
		} else {
			$this->_url .= 'page=';
		}
		
		/* 计算总页信息 */
		$this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
		if(!empty($this->totalPages) && $this->_currentPage > $this->totalPages) {
			$this->_currentPage = $this->totalPages;		//当前页
		}
				
		if ($this->_currentPage <=2){
			//<=2 显示  1 2 3 4 5 ...
			$str = $this->parsePage(1, 5);
		}else if ($this->_currentPage<=6){
			//<=6 显示 1 2 3 4 5 6 7 8 9 10 ... 
			$str = $this->parsePage(1, 10);
		}
		else if ($this->_currentPage > 6 && $this->_currentPage <= $this->totalPages -5){
			//>6 &&  totalPages-5  显示：1 2 ... 4 5 6 7 8 9 10 11 12 ...
			$str = $this->parsePage(1, 2);
			$str .= $this->parsePage($this->_currentPage-2, $this->_currentPage+4);
		} 
		else {
			//最后5页  显示 1 2 ...95 96 97 98 99 100 
			$str = $this->parsePage(1, 2);
			$str .= $this->parsePage($this->totalPages -5, $this->totalPages);
		}
		
		$result ='<ul>'.$this->parsePrev().$str.$this->parseNext().'</ul>';
		return $result;
		
	}
	/**
	 * 组装合计页
	 * @return string
	 */
	public function showTotal(){
		if ($this->totalPages < 5) {
			return '';
		}

		if (LANGUAGE =='Cn'){
			$result ='<span>共&nbsp;'.$this->totalPages.'&nbsp;页，到第</span>'
					.'<input name="page" type="text" id="gopage" size="3" value="'. $this->_currentPage .'"/>页'
					.'<input type="button" name="button" id="button" value="确定" '
					.'onclick ="goToPage(\''.$this->_url.'\',\'gopage\')"/>';
			
		}else if (LANGUAGE =='Th'){
			$result ='ทั้งหมด&nbsp;'.$this->totalPages.'&nbsp;หน้า,กับครั้งแรก'
					.'<input name="page" type="text" id="gopage" size="3" value="'. $this->_currentPage .'"/>หน้า'
					.'<input type="button" name="button" id="button" value="ตกลง" '
					.'onclick ="goToPage(\''.$this->_url.'\',\'gopage\')"/>';
		}
		
		$result .='<script type="text/javascript">'
				.'function goToPage(url,page){'
				.'var p=document.getElementById(page).value;'
						.'window.location.href=url+p;'
								.'}</script>';
		return $result;
	}
	/**
	 * 分析内页
	 * @param int $page1  开始页
	 * @param int $page2 结束页	
	 * @return string
	 */
	private function parsePage($page1,$page2){
		$str ='';
		if ($page2 > $this->totalPages) {
			$page2 = $this->totalPages;
		}
		for($i = $page1; $i <= $page2; $i ++) {
			if ($i == $this->_currentPage) {
				$str .= '<li><span>' . $i . '<span></li>';
			}
			else {
				$str .= '<li><span><a href="'.$this->_url . $i . '">' . $i . '</a><span></li>';
			}
		}
		if ($page2 < $this->totalPages -5){
			$str .='<li>...</li>';
		}
		return $str;
	}
	/**
	 * 分析上一页
	 * @return string
	 */
	private function parsePrev(){
		
		if ($this->_currentPage > 1) {
			$page = $this->_currentPage - 1;
		} else {
			$page = 0;
		}
		
		$result ='<li>&lt;&lt;</li>';
		if ($page != 0) {
			$result = '<li><span><a href="' . $this->_url . $page. '">&lt;&lt;</a><span></li>';
		}
		return $result;
	}
	/**
	 * 分析下一页
	 * @return string
	 */
	private function parseNext(){
		if ($this->_currentPage < $this->totalPages) {
			$page = $this->_currentPage + 1;
		} else {
			$page = $this->totalPages;
		}
		
		$result ='<li>&gt;&gt;</li>';
		if ($this->_currentPage != $this->totalPages) {
			$result = '<li><span><a href="' . $this->_url . $page. '">&gt;&gt;</a><span></li>';
		}
		return $result;
	}

	/**
	 * 分析参数
	 * @return string
	 */
	private function parseParameter(){
		if (empty($this->parameter)){
			return '';
		}else{
			$par ='';
			foreach ($this->parameter as $key => $value) {
				$par .= '&'.$key.'='.$value;
			}
			return substr($par, 1);
		}
	}
}