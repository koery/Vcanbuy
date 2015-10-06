<?php
class Manager extends Model {	

	/**
	 * 返回国家列表
	 * @access public
	 * @param mixed $id 查询ID
	 * @return array
	 */
	function getManager($id =''){
		$field = array (
				'id',
				'username',
				'name',
				'email',
				'sex',
				'created',
				'logged',
				'status',
				'language',
				'loggip' 
		);
		$this->clear ();											//清除所有设置
		$this->setField ( $field );										//设置查询列(查询时索引数组)
		$this->setTable ( 'vcb_manage_user' );						//设置表名
		$this->setWhere('status', '!=', '50000');						//设置where
		if ($id !=''){
			$this->setWhere('id', '=', $id);
		}
		$this->setOrderBy ( 'username' );									//设置排序	
		$data = $this->select();										//返回查询结果
		
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			//已启用
			if ($data[$i]['status'] ==10000){
				$data[$i]['status_cn'] =fn_get_lang('cn', 'enable');		//中文标题 
				$data[$i]['status_th'] =fn_get_lang('th', 'enable');		//泰文标题
			}else if ($data[$i]['status'] ==30000){
				//已停用
				$data[$i]['status_cn'] =fn_get_lang('cn', 'disable');				//中文标题
				$data[$i]['status_th'] =fn_get_lang('th', 'disable');			//泰文标题
			}
		}

		return $data;
	}
}
