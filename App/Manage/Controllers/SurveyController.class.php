<?php
/*
 * @author yanghw
 * @access public
 * Controller Manage/Controller/SurveyController
 */

class SurveyController extends Controller{
	
/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {		
	}
	/**
	 * 系统函数
	 * @access public
	 */
	function afterAction() {
	}
	public function index(){
		
		$field = array (
				'id',
				'manage',
				'title',
				'created',
				'status',
		);
		$m = new Survey();
		$m->clear();											 
		$m->setField ( $field );									 
		$m->setTable ( 'vcb_survey' );
		$m->setWhere('status', '!=', '60000');
		$data = $m->select();
		$this->assign('data', $data);		
	}
	
	
	//添加问卷页面显示
	
	public function add(){
		
	}
	
	
	//添加问卷
	public function add_save(){
		
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$title = get_post_value('survey_title');
		$field = array(
				'title'=>$title,
				'start_time'=>$start_time,
				'end_time'=>$end_time,
				'created'=>date('Y-m-d H:i:s', time()),
				'status'=>'10000',
				//'manage'=>'',
		);
		$m = new Survey();
		$m->clear();		
		$m->setField($field);
		$m->setTable('vcb_survey');
		$data = $m->insert();
		if($data>0){
			header("Location:add_success");
		}
	}
	
	
	//删除问卷
	public function delete(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey' );				
		$m->setWhere('id','=',$id);				
		$data = $m->update();
		
		//返回
	if($data>0){
			header("Location:add_success");
		}
	}
	
	
	//修改问卷页面
	public function update(){
	$id = get_post_value('id');
		$field = array (
				'id',
				'title',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );
		$m->setWhere('id','=',$id);								
		$m->setTable ( 'vcb_survey' );	
		$data = $m->select();
		var_dump($data);
		if(!empty($data)){
			$this->assign('data', $data);
		}
		else {
			header("Location:error");
		}
	}
	
	
	//修改问卷页面保存
	public function update_save(){
		$id = get_post_value('id');
		$title = get_post_value('title');
		$field = array (
				'title'=>$title,
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );	
		$m->setWhere('id','=',$id);									
		$m->setTable ( 'vcb_survey' );	
		$data = $m->update();
		//var_dump($data);
		
		if(!empty($data)){
			header("Location:add_success");
		}
		else {
			header("Location:error");
		}
	}
	
	
	//添加问题页面显示
	public function add_issue(){
		$id = get_post_value('id');
		$field = array (
				'id',
				'title',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		//var_dump($data);
		
		if(!empty($data)){
			
			$field1 = array (
				'issue.id',
				'issue.survey_id',
				'issue.issue',
				//'item.id',
				'item.item',
				'item.status',
				'item.issue_id',
				'issue.issue_type',
				'issue.status',
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_issue AS issue' );
			$m1->setJoin('vcb_survey_item as item','issue.id=item.issue_id','left join');		
			$m1->setWhere('issue.issue_type', '=', '10000');
			$m1->setWhere('issue.survey_id', '=', $id);
			$m1->setWhere('issue.status', '!=', '60000');
			$count = $m1->getRowsCount();
		
		$page = new Page($count);
		$parameter = array(
		);
		$page->setParameter($parameter);
		$showPage = $page->showPage();
		$showTotal = $page->showTotal();				
			$data_issue = $m1->select();
		//	var_dump($data_issue);
			$this->assign ('showPage', $showPage );			//输出分页
			$this->assign ('showTotal', $showTotal );
			$this->assign('data', $data);
			$this->assign('data_issue', $data_issue);
			
			
			
			
			
			
			
			
			//多项
			$field2 = array (
				'issue.id',
				'issue.survey_id',
				'issue.issue',
				//'item.id',
				'item.item',
				'item.status',
				'item.issue_id',
				'issue.issue_type'
			);
			$m2 = new Survey();
			$m2->clear();
			$m2->setField ( $field1 );								
			$m2->setTable ( 'vcb_survey_issue AS issue' );
			$m2->setJoin('vcb_survey_item as item','issue.id=item.issue_id','left join');		
			$m2->setWhere('issue.issue_type', '=', '20000');
			$m2->setWhere('issue.survey_id', '=', $id);
			$count2 = $m2->getRowsCount();
		
		$page2 = new Page($count2);
		$parameter2 = array(
		);
		$page2->setParameter($parameter2);
		$showPage2 = $page2->showPage();
		$showTotal2 = $page2->showTotal();				
			$data_issue2 = $m2->select();
			//var_dump($data_issue2);
			$this->assign ('showPage2', $showPage );			//输出分页
			$this->assign ('showTotal2', $showTotal );
			$this->assign('data_issue2', $data_issue2);
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		}
		else {
			header("Location:error");
		}
		
	}
	
	
	
	//添加问题保存
	public function add_issue_save(){
	$id = get_post_value('id');
	if(get_post_value('issue_title') !=null)
	{
		$issue = get_post_value('issue_title');
		$field = array (
				'survey_id'=>$id,
				'issue'=>$issue,
				'status'=>'10000',
				'issue_type'=>'10000',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );	
		$data = $m->insert();
	}
	else {
		$issue = get_post_value('issue_title2');
		$field = array (
				'survey_id'=>$id,
				'issue'=>$issue,
				'status'=>'10000',
				'issue_type'=>'20000',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );	
		$data = $m->insert();
	}
		//var_dump($data);
		
		if(!empty($data)){
			header("Location:add_issue?id=".$id);
		}
		else {
			header("Location:error");
		}
	}
	
	
	//修改问题
	public function update_issue(){
		$id = get_post_value('id');
		$field = array (
				'id',
				'issue',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );
		$m->setWhere('id','=',$id);								
		$m->setTable ( 'vcb_survey_issue' );	
		$data = $m->select();
		if(!empty($data)){
			$this->assign('data', $data);
		}
		else {
			header("Location:error");
		}
	}
	//修改问题保存
	public function update_issue_save(){
	$id = get_post_value('id');
	$issue = get_post_value('issue');
		$field = array (
				'issue'=>$issue,
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );	
		$m->setWhere('id','=',$id);									
		$m->setTable ( 'vcb_survey_issue' );	
		$data = $m->update();
		//var_dump($data);
		
		if(!empty($data)){
			header("Location:add_success");
		}
		else {
			header("Location:error");
		}
	}
	
	
	//删除问题
	public function delete_issue(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );				
		$m->setWhere('id','=',$id);				
		$data = $m->update();
		
		//返回
	if($data>0){
			header("Location:add_success");
		}
	}
	
	
	
	
	//添加选项页面显示
	
	
	public function add_item(){
		$id = get_post_value('id');
		/*$field = array (
				'survey_issue.id',
				'survey_issue.issue',
				'survey_item.id',
				'survey_item.issue_id',
				'survey_item.item',
				'survey_item.status',
		);
		$m = new Floor();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_survey_issue AS survey_issue' );
		$m->setJoin('vcb_survey_item as survey_item','survey_issue.id=survey_item.issue_id');
		$m->setWhere('survey_issue.id', '=', $id);
		$m->setWhere('survey_item.status', '=', '60000');
		$data = $m->select();
		var_dump($data);*/
		//$this->assign('data', $data);
		
		
		
	$field = array (
				'id',
				'issue',
				'survey_id',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		var_dump($data);
		
		if(!empty($data)){
			
			$field1 = array (
				'id',
				'issue_id',
				'item',
				'status',
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_item' );				
			$m1->setWhere('issue_id','=',$id);		
			$m1->setWhere('status','!=','60000');		
			$data_issue = $m1->select();
			var_dump($data_issue);
			$this->assign('data', $data);
			$this->assign('data_issue', $data_issue);
		}
		else {
			header("Location:error");
		}
		
	}
	
	//添加选项保存
	
	public function add_item_save(){
		
		$id = get_post_value('id');
		$item = get_post_value('item');
		$field = array(
			'issue_id'=>$id,
			'item'=>$item,
			'selected'=>0,
			'status'=>'10000',
			'type'=>'10000',
		);
		$m = new Survey();
		$m->clear();
		$m->setField($field);
		$m->setTable(' vcb_survey_item ');
		$data = $m->insert();
		if(!empty($data)){
			header("Location:add_item?id=".$id);
		}
		else{
			header("Location:error");
		}
		
		
	}	
	
	
	
	//修改选项
	public function update_item(){
		$id = get_post_value('id');
		$field = array (
				'id',
				'item',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );
		$m->setWhere('id','=',$id);								
		$m->setTable ( 'vcb_survey_item' );	
		$data = $m->select();
		if(!empty($data)){
			$this->assign('data', $data);
		}
		else {
			header("Location:error");
		}
	}
	//修改选项保存
	public function update_item_save(){
	$id = get_post_value('id');
	$item = get_post_value('item');
		$field = array (
				'item'=>$item,
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );	
		$m->setWhere('id','=',$id);									
		$m->setTable ( 'vcb_survey_item' );	
		$data = $m->update();
		//var_dump($data);
		
		if(!empty($data)){
			header("Location:add_success");
		}
		else {
			header("Location:error");
		}
	}

	//删除选项
	public function delete_item(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_item' );				
		$m->setWhere('id','=',$id);				
		$data = $m->update();
		
		//返回
	if($data>0){
			header("Location:add_success");
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	//添加多选项页面显示
	
	
	public function add_oitem(){
		$id = get_post_value('id');
		/*$field = array (
				'survey_issue.id',
				'survey_issue.issue',
				'survey_item.id',
				'survey_item.issue_id',
				'survey_item.item',
				'survey_item.status',
		);
		$m = new Floor();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_survey_issue AS survey_issue' );
		$m->setJoin('vcb_survey_item as survey_item','survey_issue.id=survey_item.issue_id');
		$m->setWhere('survey_issue.id', '=', $id);
		$m->setWhere('survey_item.status', '=', '60000');
		$data = $m->select();
		var_dump($data);*/
		//$this->assign('data', $data);
		
		
		
	$field = array (
				'id',
				'issue',
				'survey_id',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		var_dump($data);
		
		if(!empty($data)){
			
			$field1 = array (
				'id',
				'issue_id',
				'item',
				'status',
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_item' );				
			$m1->setWhere('issue_id','=',$id);		
			$m1->setWhere('status','!=','60000');		
			$data_issue = $m1->select();
			var_dump($data_issue);
			$this->assign('data', $data);
			$this->assign('data_issue', $data_issue);
		}
		else {
			header("Location:error");
		}
		
	}
	
	//添加多选项保存
	
	public function add_oitem_save(){
		
		$id = get_post_value('id');
		$item = get_post_value('item');
		$field = array(
			'issue_id'=>$id,
			'item'=>$item,
			'selected'=>0,
			'status'=>'10000',
			'type'=>'20000',
		);
		$m = new Survey();
		$m->clear();
		$m->setField($field);
		$m->setTable(' vcb_survey_item ');
		$data = $m->insert();
		if(!empty($data)){
			header("Location:add_oitem?id=".$id);
		}
		else{
			header("Location:error");
		}
		
		
	}	
	
	
	
	//修改多选项
	public function update_oitem(){
		$id = get_post_value('id');
		$field = array (
				'id',
				'item',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );
		$m->setWhere('id','=',$id);								
		$m->setTable ( 'vcb_survey_item' );	
		$data = $m->select();
		if(!empty($data)){
			$this->assign('data', $data);
		}
		else {
			header("Location:error");
		}
	}
	//修改多选项保存
	public function update_oitem_save(){
	$id = get_post_value('id');
	$item = get_post_value('item');
		$field = array (
				'item'=>$item,
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );	
		$m->setWhere('id','=',$id);									
		$m->setTable ( 'vcb_survey_item' );	
		$data = $m->update();
		//var_dump($data);
		
		if(!empty($data)){
			header("Location:add_success");
		}
		else {
			header("Location:error");
		}
	}

	//删除多选项
	public function delete_oitem(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_item' );				
		$m->setWhere('id','=',$id);				
		$data = $m->update();
		
		//返回
	if($data>0){
			header("Location:add_success");
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//预览
	public function preview(){
		/*$id = get_post_value('id');
		$field = array (
				'id',
				'title',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		var_dump($data);
		
		if(!empty($data)){
			
			$field1 = array (
				'issue.id',
				'issue.survey_id',
				'issue.issue',
				//'item.id',
				'item.item',
				'item.status',
				'item.issue_id',
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_issue AS issue' );
			$m1->setJoin('vcb_survey_item as item','issue.id=item.issue_id','left join');		
			//$m1->setWhere('item.status', '!=', '60000');				
			$data_issue = $m1->select();
			var_dump($data_issue);
			$this->assign('data', $data);
			$this->assign('data_issue', $data_issue);
		}
		else {
			header("Location:error");
		}*/
		$id = get_post_value('id');
		$field = array (
				'id',
				'title',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		$this->assign('data', $data);
		//var_dump($data);
		
		if(!empty($data)){
				$field1 = array (
				'id',
				'issue',
				'survey_id',
				'status',
				
				);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_issue' );				
			$m1->setWhere('survey_id','=',$id);
			$m1->setWhere('status','!=','60000');
			$data_issue = $m1->select();
			$this->assign('data_issue', $data_issue);

			$field2 = array (
				'id',
				'item',
				'issue_id',
				'status',
				'type',
				);
			$m2 = new Survey();
			$m2->clear();
			$m2->setField ( $field2 );								
			$m2->setTable ( 'vcb_survey_item' );				
			$m2->setWhere('status','!=','60000');
			$data_item = $m2->select();
			$this->assign('data_item', $data_item);
			
			//var_dump($data_item);
		}
	}
	
	
	//查看统计结果页面
	public function count_result(){
		$id = get_post_value('id');
		
	$field = array (
				'id',
				'title',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey' );				
		$m->setWhere('id','=',$id);				
		$data = $m->select();
		$this->assign('data', $data);
		//var_dump($data);
		
		if(!empty($data)){
				$field1 = array (
				'id',
				'issue',
				'survey_id'
				);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_issue' );				
			$m1->setWhere('survey_id','=',$id);
			$data_issue = $m1->select();
			$this->assign('data_issue', $data_issue);

			$field2 = array (
				'id',
				'item',
				'issue_id',
				'status',
				'selected',
				);
			$m2 = new Survey();
			$m2->clear();
			$m2->setField ( $field2 );								
			$m2->setTable ( 'vcb_survey_item' );				
			$m2->setWhere('status','!=','60000');
			$data_item = $m2->select();
			$this->assign('data_item', $data_item);
			
		}
	}
	
	
	//统计
	public function count_re(){
		
		$id = get_post_value('id');
		$field = array (
				'id',
				'survey_id',
				
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_issue' );				
		$m->setWhere('survey_id','=',$id);				
		$data = $m->select();
		var_dump($data[0]['id']);
		$count = count($data);
		$star = $data[0]['id'];
		$end = $data[0]['id'] + $count-1;
		//echo $star."<br>";
		//echo $end."<br>";
		//var_dump(get_post_value('27'));
		for($i=$star;$i<=$end;$i++)
		{
			if(get_post_value($i)!=null)
			{
			$name= get_post_value($i);
			//echo $name."<br/>";
			if(is_array($name))
			{
				$co = count($name);
				for($j=0;$j<$co;$j++)
				{
					$this->count_item($name[$j]);
					//echo $name[$j];
				}
			}
			else 
			{
				$this->count_item($name);
				//echo $name;
			}
			}
			/*$field1 = array (
				'id',
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_item' );				
			$m1->setWhere('id','=',$name);				
			$data_l = $m->select();
			//var_dump($data_l);*/
		}
			header("Location:add_success");
	}
	
	
	
	
	//累加
	
	function count_item($i){
		
		$field = array (
				'selected',
		);
		$m = new Survey();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_survey_item' );				
		$m->setWhere('id','=',$i);				
		$data = $m->select();
		$add = $data[0]['selected']+1;
		$field1 = array (
				'selected'=>$add,
			);
			$m1 = new Survey();
			$m1->clear();
			$m1->setField ( $field1 );								
			$m1->setTable ( 'vcb_survey_item' );				
			$m1->setWhere('id','=',$i);				
			$data_l = $m1->update();
			//var_dump($data_l);
	}
}
?>




















