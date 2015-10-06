<?php

// +----------------------------------------------------------------------
//  文件名称：Db.php
//	创建日期：2014-9-12
//  功能说明：关于数据库操作
//	作       者：香永华
//  版 本  号： 1.0.0.1
// +----------------------------------------------------------------------
// | Author: xyh
// +----------------------------------------------------------------------

/**
 *  数据库中间层实现类
 */
final class Db {

    private $_dbHandle = NULL;    //数据库联接
    private $_result = NULL;       //返回结果
    private $_limit = NULL;    //返回数
    private $_distinct = '';    //distinct查询
    private $_page = NULL;    //页数
    private $_orderBy = array();   //Order By
    private $_table = '';    //数据表名
    private $_where = array();   //Where 查询
    private $_groupBy = array();   //Group By 条件
    private $_field = array();   //field 字段
    private $_join = array();   //Join查询
    private $_union = array();   //Union查询

    /**
     * 初始化
     * @access public
     */

    public function __construct() {

        $this->_dbHandle = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        if ($this->_dbHandle != 0) {
            if (mysql_select_db(DB_NAME, $this->_dbHandle)) {
                mysql_query("SET NAMES utf8", $this->_dbHandle);
            }
        }
    }

    /**
     * 析构方法
     * @access public
     */
    public function __destruct() {
        if (@mysql_close($this->_dbHandle) != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * where 设置
     * @access public
     * @param string $field 	列名
     * @param string $operate 	操作符号(=,!=,LIKE,IN)
     * @param string/array $value  	查询关键字
     * @param string $symbol	逻辑运算符 : AND[默认]、OR ,XOR
     * @param string $brackets   括号 (/)
     */
    public function setWhere($field, $operate, $value, $symbol = 'AND', $brackets = '') {

        $symbol = trim(strtoupper($symbol));
        if (in_array($symbol, array('AND', 'XOR', 'OR', 'IN'))) {
            $whereStr = ' ' . $symbol . ' ';
        } else {
            $whereStr = ' AND ';
        }

        $operate = trim(strtoupper($operate));
        $data = '';
        if (is_array($value)) {
            foreach ($value as $key) {
                $data .= ',' . $this->parseValue($key);
            }
            $data = substr($data, 1);
        } else {
            $data = $this->parseValue($value);
        }

        $left_brackets = '';
        $right_brackets = '';
        if ($brackets == '(') {
            $left_brackets = '(';
        } else if ($brackets == ')') {
            $right_brackets = ')';
        }


        if (in_array($operate, array('IN', 'NO IN'))) {
            $whereStr .= $left_brackets . $this->parseField($field) . ' ' . $operate . ' (' . $data . ') ';
        } else {
            $whereStr .= $left_brackets . $this->parseField($field) . ' ' . $operate . ' ' . $data . ' ';
        }

        $this->_where[] = $whereStr . $right_brackets;
    }

    /**
     * Group By 设置
     * @access public
     * @param string|array $var 	列名
     */
    public function setGroupBy($var) {
        if (is_array($var)) {
            $this->_groupBy = $var;
        } else {
            $this->_groupBy = array();
            $this->_groupBy[] = $var;
        }
    }

    /**
     * Join 设置
     * @access public
     * @param string 		$table		 	join 表名
     * @param string|array 	$conditions 	join 条件
     * @param string 		$type		    join 类型(INNER JOIN[默认],LEFT OUTER JOIN, RIGHT OUTER JOIN,FULL OUTER JOIN)
     */
    public function setJoin($table, $conditions, $type = 'INNER JOIN') {
        $this->_join['table'][] = $table;
        $this->_join['conditions'][] = $conditions;
        $this->_join['type'][] = $type;
    }

    /**
     * Union 设置
     * @access public
     * @param string 		$table		 	UION 表名
     * @param array  		$field			查询列名
     * @param array 		$where 			where 条件
     * @param string 		$type			union 类型(UION ALL[默认],UNION)
     */
    public function setUnion($table, $field, $where, $type = 'UNION ALL') {
        $this->_union['table'][] = $table;
        $this->_union['field'][] = $field;
        $this->_union['where'][] = $where;
        $this->_union['type'][] = $type;
    }

    /**
     * setLimit 设置 返回行数
     * @access public
     * @param int $lmit
     */
    public function setLimit($var) {
        $this->_limit = $var;
    }

    /**
     * SetDistinct 设置 Distinct查询
     * @access public
     */
    public function setDistinct() {
        $this->_distinct = 'DISTINCT ';
    }

    /**
     * setPage 设置页码
     * @access public
     * @param int $page
     */
    public function setPage($var) {
        $this->_page = $var;
        if (!isset($this->_limit)) {
            $this->_limit = DEFAULT_LIMIT;
        }
    }

    /**
     * setTable 设置表名
     * @access public
     * @param sting $table
     */
    public function setTable($var) {
        $this->_table = $var . ' ';
    }

    /**
     * setField 设置Field
     * @access public
     * @param array $field
     */
    public function setField($var) {
        $this->_field = $var;
    }

    /**
     * Order by 设置
     * @access public
     * @param string|array $orderBy (数组格式为：field =>ASC|DESC);
     */
    public function setOrderBy($orderBy) {
        if (is_array($orderBy)) {
            $this->_orderBy = $orderBy;
        } else {
            $this->_orderBy = array();
            $this->_orderBy[] = $orderBy;
        }
    }

    /**
     * parseField 列名分析
     * @access protected
     * @param sting|array $field
     * @return string
     */
    protected function parseField($var) {
        if (is_array($var)) {
            foreach ($var as $str) {
                if (in_array($str, array(' DELETE ', ' INSERT INTO '))) {
                    return '';
                }
            }
            return implode(',', $var);
        } else {
            $str = strtoupper($var);
            if (in_array($str, array(' DELETE ', ' INSERT INTO '))) {
                return '';
            } else {
                return $var;
            }
        }
    }

    /**
     * parseTable 表名分析
     * @access protected
     * @param sting $var(默认) $this->_table
     * @return string
     */
    protected function parseTable($var = '') {
        if ($var == '') {
            $var = $this->_table;
        }
        $str = strtoupper($var);
        if (in_array($str, array(' DELETE ', ' INSERT INTO ', ' SELECT '))) {
            return '';
        } else {
            return $var;
        }
    }

    /**
     * parseWhere Where分析
     * @access protected
     * @param string $var(默认) $this->_where
     * @return string
     */
    protected function parseWhere($var = '') {
        if ($var == '') {
            $var = $this->_where;
        }
        if (empty($var)) {
            return '';
        } else {
            $str = trim(implode('', $var));
            $sub_str2 = substr($str, 0, 2);  //OR
            $sub_str3 = substr($str, 0, 3);  //AND

            if (in_array($sub_str3, array('AND', 'XOR'))) {
                $str = substr($str, 4);
            } else if (in_array($sub_str2, array('OR'))) {
                $str = substr($str, 3);
            }
            return ' WHERE (' . $str . ')';
        }
    }

    /**
     * parseGroup Group By 分析
     * @access protected
     * @return string
     */
    protected function parseGroupBy() {
        if (empty($this->_groupBy)) {
            return '';
        } else {
            //数据检测
            foreach ($this->_groupBy as $group) {
                $group = strtoupper($group);
                if (in_array($group, array(',', ' INSERT ', ' DELETE ', ' UPDATE '))) {
                    return '';
                }
            }
            $group = implode(',', $this->_groupBy);

            return ' GROUP By ' . $group;
        }
    }

    /**
     * parseJoin Join 分析
     * @access protected
     * @return string
     */
    protected function parseJoin() {
        if (empty($this->_join)) {
            return '';
        } else {
            $array = array();
            $count = count($this->_join['table']);
            for ($i = 0; $i < $count; $i ++) {
                $array [] = ' ' . $this->_join['type'][$i]
                        . ' ' . $this->parseTable($this->_join['table'][$i])
                        . ' ON ' . $this->_join ['conditions'][$i] . ' ';
            }

            return implode('', $array);
        }
    }

    /**
     * parseUnion Union 分析
     * @access protected
     * @return string
     */
    protected function parseUnion() {
        if (empty($this->_union)) {
            return '';
        } else {
            $array = array();
            $count = count($this->_union['table']);
            for ($i = 0; $i < $count; $i ++) {
                $field = $this->parseField($this->_union['field'][$i]);
                $table = $this->parseTable($this->_union['table'][$i]);
                $where = $this->parseWhere($this->_union['where'][$i]);
                $type = strtoupper(trim($this->_union['type'][$i]));

                //类型检测
                if (!in_array($type, array('UNION', 'UNION ALL')))
                    return '';

                $array [] = ' ' . $type . ' SELECT ' . $field
                        . ' FROM ' . $this->parseTable($table) . $where;
            }
            return implode('', $array);
        }
    }

    /**
     * parseOrderBy orderBy分析
     * @access protected
     * @return string
     */
    protected function parseOrderBy() {
        if (empty($this->_orderBy)) {
            return '';
        } else {
            $orderBy = '';
            foreach ($this->_orderBy as $key => $value) {
                if (is_numeric($key)) {
                    $orderBy .=',' . $value;
                } else {
                    $orderBy .=',' . $key . ' ' . $value;
                }
            }
            $orderBy = substr($orderBy, 1);
            return ' ORDER BY ' . $orderBy;
        }
    }

    /**
     * 数据检测
     * @access protected
     * @return bool
     */
    protected function verifyData() {
        foreach ($this->_field as $key => $value) {
            $field[] = $key;
            $data[] = $value;
        }
        $table = $this->parseTable();
        $field = $this->parseField($field);
        $where = $this->parseWhere();
        $query = "SELECT " . $field . ' FROM ' . $table . $where;
        //echo $query;
        $result = mysql_query($query, $this->_dbHandle);

        $count = count($field);
        for ($i = 0; $i < $count; $i++) {
            $type = mysql_field_type($result, $i);
            if (($type == 'real' || $type == 'int')) {
                if (trim($data[$i]) != '' && !is_numeric($data[$i])) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * parseSet分析
     * @access protected
     * @param array $data
     * @return string
     */
    protected function parseSet($data) {
        foreach ($data as $key => $val) {
            $set[] = $this->parseField($key) . '=' . $this->parseValue($val);
        }
        return ' SET ' . implode(',', $set);
    }

    /**
     * parseLimit 分析
     * @access protected
     * @return string
     */
    protected function parseLimit() {

        if (!isset($this->_limit) || $this->_limit > DEFAULT_MAX_LIMIT) {
            $limit = DEFAULT_MAX_LIMIT;
        } else {
            $limit = $this->_limit;
        }

        if (isset($this->_page) && $this->_page > 0) {
            $limit = ' LIMIT ' . $limit * ($this->_page - 1) . ',' . $limit;
        } else {
            $limit = ' LIMIT 0 ,' . $limit;
        }

        return $limit;
    }

    /**
     * parseValue 值分析
     * @access protected
     * @param sting $value
     * @return string
     */
    public function parseValue($value) {
        return '\'' . mysql_real_escape_string($value) . '\'';
    }

    /**
     * 清空所有设置
     * @access public
     */
    public function clear() {
        $this->_result = NULL;
        $this->_limit = NULL;
        $this->_distinct = '';
        $this->_page = NULL;
        $this->_orderBy = array();
        $this->_table = '';
        $this->_where = array();
        $this->_groupBy = array();
        $this->_field = array();
        $this->_join = array();
        $this->_union = array();
    }

    /**
     * 清空Where
     * @access public
     */
    public function clearWhere() {
        $this->_where = array();
    }

    /**
     * 获取一条记录的某个字段值
     * @access public
     * @param string $field 列名
     * @return mixed
     */
    public function getFieldValue($var) {
        $query = 'SELECT ' . $this->_distinct . ' ' . $this->parseField($var) . ' ';
        $query .= ' FROM ' . $this->_table;
        $query .= $this->parseWhere();
        $query .= $this->parseOrderBy();
        $query .= ' LIMIT 0,100';

        //echo '<br>'.$query.'<br>';
        $this->_result = mysql_query($query, $this->_dbHandle);
        $array = mysql_fetch_array($this->_result);
        mysql_free_result($this->_result);
        if (empty($array)) {
            return null;
        } else {
            return $array[0];
        }
    }

    /**
     * 查找记录
     * @access public
     * @return array
     */
    public function select() {
        $query = 'SELECT ' . $this->_distinct;
        $query .= implode(',', $this->_field) . ' ';
        $query .= ' FROM ' . $this->parseTable();
        if (!empty($this->_join)) {
            //join
            $query .= $this->parseJoin();
            $query .= $this->parseWhere();
        } else if (!empty($this->_union)) {
            //union
            $query .= $this->parseWhere();
            $query .= $this->parseUnion();
        } else {
            $query .= $this->parseWhere();
        }

        $query .= $this->parseGroupBy();
        $query .= $this->parseOrderBy();
        $query .= $this->parseLimit();

        //echo '<br>'.$query.'<br>';

        $this->_result = mysql_query($query, $this->_dbHandle);


        $result = array();
        $field = array();
        $tempResults = array();
        $numOfFields = mysql_num_fields($this->_result);
        for ($i = 0; $i < $numOfFields; $i++) {
            $field[] = strtolower(mysql_field_name($this->_result, $i));
        }

        while ($row = mysql_fetch_row($this->_result)) {
            for ($i = 0; $i < $numOfFields; $i++) {
                $tempResults[$field[$i]] = $row[$i];
            }
            $result[] = $tempResults;
        }

        mysql_free_result($this->_result);
       // echo $query;
        return($result);
    }

    /**
     * 更新记录
     * @access public
     * @return false | integer(更新行数)
     */
    public function update() {
        $where = $this->parseWhere();
        if ($where == '') {
            return false;
        }
        if (!$this->verifyData())
            return false;
        $table = $this->parseTable();
        $query = 'UPDATE ' . $table . $this->parseSet($this->_field) . $where;
       // echo '<br>' . $query . '<br>';
        if (!mysql_query($query)) {
            return false;
        } else {
            $row = mysql_affected_rows();
            return $row;
        }
    }

    /**
     * 插入记录
     * @access public
     * @return false | integer(ID)
     */
    public function insert() {
        if (!$this->verifyData())
            return false;
        foreach ($this->_field as $key => $val) {
            $fields[] = $this->parseField($key);
            $values[] = $this->parseValue($val);
        }
        $table = $this->parseTable();
        $query = 'INSERT INTO ' . $table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $values) . ')';
         //echo '<br>' . $query . '<br>';
        if (!mysql_query($query)) {
            return false;
        } else {
            return mysql_insert_id();
        }
    }

    /**
     * 获取rows记录数
     * @access public
     * @return int
     */
    public function getRowsCount() {
        $query = 'SELECT ' . $this->_distinct;
        $query .= implode(',', $this->_field) . ' ';
        $query .= ' FROM ' . $this->parseTable();
        if (!empty($this->_join)) {
            //join
            $query .= $this->parseJoin();
            $query .= $this->parseWhere();
        } else if (!empty($this->_union)) {
            //union
            $query .= $this->parseWhere();
            $query .= $this->parseUnion();
        } else {
            $query .= $this->parseWhere();
        }

        $query .= $this->parseGroupBy();
        $query .= $this->parseOrderBy();
        $query .= $this->parseLimit();

        //echo '<br.>'.$query.'<br>';

        $result = mysql_query($query, $this->_dbHandle);
        $count = mysql_num_rows($result);

        return $count;
    }

    public function getError() {
        return mysql_error($this->_dbHandle);
    }

}
