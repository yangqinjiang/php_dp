<?php
/**
 * 单例模式的代码
 */
class sigle{
	protected static $ins = null;
	public static function getIns(){
		if(self::$ins===null){
			self::$ins=new self();
		}
		return self::$ins;
	}
	//方法前加final,则方法不能被覆盖,类前加final,则类不能被继承
	final protected function __construct(){

	}
	//封锁clone
	final protected function __clone(){

	}
}
$s1=sigle::getIns();
$s2=sigle::getIns();
// $s2 =clone $s1;//被克隆了,又产生了多个对象
if($s1===$s2){//当两个对象 是指向同一个对象时
	echo "是一个对象";
}else{
	echo "不是一个对象";
}