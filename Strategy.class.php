<?php
//使用策略模式来实现一个计算器
interface Math{
	function calc($op1,$op2);
}
class MathAdd implements Math{
	public function calc($op1,$op2)
	{
		return $op1+$op2;
	}
}

class MathSub implements Math{
	public function calc($op1,$op2)
	{
		return $op1-$op2;
	}
}
class MathMul implements Math{
	public function calc($op1,$op2)
	{
		return $op1*$op2;
	}
}
class MathDiv implements Math{
	public function calc($op1,$op2)
	{
		return $op1/$op2;
	}
}
// $_POST['op'] = '+';
// if($_POST['op']){

// }
//封装一个虚拟计算器
class CMath{
	protected $calc_ins = null;
	public function __construct($type){
		$calc_type='Math'.$type;
		if(class_exists($calc_type)){
			$this->calc_ins = new $calc_type();
		}else{
			exit($calc_type.'不存在该类');
		}
	}
	public function calcF($op1,$op2)
	{
		return $this->calc_ins->calc($op1,$op2);
	}
}

$type ='Add';
$op1 = 10;
$op2 = 5;
$cmath = new CMath($type);
echo $cmath->calcF($op1,$op2);
