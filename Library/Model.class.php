<?php
class  Model {
	// 当前数据库操作对象
	private $_db               =   null;
	
	function __construct() {
		$this->_db = new Db();
	}
	/**
	 * 析构方法
	 * @access public
	 */
	function __destruct() {
	
	}
	/**
	 * where 设置
	 * @access public
	 * @param string $field 	列名
	 * @param string $operate 	操作符号(=,!=,LIKE,IN)
	 * @param string $value  	查询关键字
	 * @param string $symbol	逻辑运算符 : AND[默认]、OR ,XOR
	 * @param string $brackets   括号 (/)
	 */
	public function setWhere($field,$operate,$value,$symbol ='',$brackets='') {
		$this->_db->setWhere( $field, $operate, $value,$symbol,$brackets);
	}
	/**
	 * group 设置
	 * @access public
	 * @param string|array $var 	列名
	 */
	public function setGroupBy($var){
		$this->_db->setGroupBy($var);
	}
	/**
	 * Join 设置
	 * @access public
	 * @param string 		$table		 	join 表名
	 * @param string|array 	$conditions 	join 条件
	 * @param string 		$typ	e		join 类型(INNER JOIN[默认],LEFT OUTER JOIN, RIGHT OUTER JOIN,FULL OUTER JOIN)
	 */
	public function setJoin($table,$conditions,$type='INNER JOIN'){
		$this->_db->setJoin($table, $conditions,$type);
	}
	/**
	 * Union 设置
	 * @access public
	 * @param string 		$table		 	UION 表名
	 * @param array  		$field			查询列名
	 * @param array 		$where 			where 条件
	 * @param string 		$type			union 类型(UION ALL[默认],UNION)
	 */
	public function setUnion($table,$field,$where,$type ='UNION ALL'){
		$this->_db->setUnion ( $table, $field, $where, $type );
	}
	/**
	 * setLimit 设置 返回行数
	 * @access public
	 * @param int $var
	 */
	public function setLimit($var) {
		$this->_db->setLimit($var);
	}
	/**
	 * SetDistinct 设置 Distinct查询
	 * @access public
	 */
	public function setDistinct(){
		$this->_db->setDistinct();
	}
	/**
	 * setPage 设置页码
	 * @access public
	 * @param int $var
	 */
	public function setPage($var ='') {
		if ($var ==''){
			$var = get_current_page();
		}
		$this->_db->setPage($var);
	}
	/**
	 * setTable 设置表名
	 * @access public
	 * @param sting $var
	 */
	public function setTable($var){
		$this->_db->setTable($var);
	}
	/**
	 * setField 设置Field
	 * @access public
	 * @param array $field
	 */
	public function setField($field){
		$this->_db->setField($field);
	}
	/**
	 * setOrder 设置
	 * @access public
	 * @param mixed $var
	 */
	public function setOrderBy($var) {
		$this->_db->setOrderBy($var);
	}
	/**
	 * 清空Wher
	 * @access public
	 */
	public function clearWhere(){
		$this->_db->clearWhere();
	}
	/**
	 * 清空所有设置
	 * @access public
	 */
	public function clear(){
		$this->_db->clear();
	}
	
	/**
	 * 获取一条记录的某个字段值
	 * @access public
	 * @return mixed
	 */
	public function getFieldValue($var) {
		return $this->_db->getFieldValue($var);
	}
	/**
	 * 查找记录
	 * @access public
	 * @return mixed
	 */
	public  function select() {
		return  $this->_db->select();
	}

	/**
	 * 更新记录
	 * @access public
	 * @return false | integer
	 */
	public function update() {
		return  $this->_db->update();
	}
	/**
	 * 插入记录
	 * @access public
	 * @return false | integer(ID)
	 */
	public function insert() {
		return $this->_db->insert();
	}
	/**
	 * 获取rows记录数
	 * @access public
	 * @return int
	 */
	public function getRowsCount() {
		return $this->_db->getRowsCount();
	}
}
