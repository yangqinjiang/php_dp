<?php

// 使用职责链模式的处理

// Chain of Responsibility
// $lev=$_POST['jubao']+0;

class board{
	//权限值
	protected $power =1;
	//$top上级
	protected $top='admin';
	public function process($lev)
	{
		if($lev<=$this->power){
			echo "版主删帖";
		}else{
			$top=new $this->top;
			$top->process($lev);
		}
	}
}
class admin{
	protected $power =2;
	protected $top='police';
	public function process($lev)
	{
		if($lev<=$this->power){
			echo "管理员封账号";
		}else{
			$top=new $this->top;
			$top->process($lev);
		}
	}
}
class police{
	protected $top=null;//没有上一级
	protected $power;
	public function process($lev)
	{
		echo "捉起来";
	}
}
// 使用职责链模式的处理
// $lev=$_POST['jubao']+0;
$lev=rand(1,4);
echo $lev;
$judge=new board();
$judge->process($lev);
