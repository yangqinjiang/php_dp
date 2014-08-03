<?php

// 不使用职责链模式的处理

// Chain of Responsibility
$lev=$_POST['jubao']+0;

class board{
	public function process()
	{
		echo "版主删帖";
	}
}
class admin{
	public function process()
	{
		echo "管理员封账号";
	}
}
class police{
	public function process()
	{
		echo "捉起来";
	}
}
if($lev == 1){
	$judge = new board();
	$judge->process();
}else if($lev==2){
	$judge = new admin();
	$judge->process();
}else{
	  $judge = new police();
	$judge->process();
}
