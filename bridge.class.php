<?php
////桥接模式 bridge
//论坛给用户发信息可以是站内容,email.手机
//减小类的维度
abstract class info{
	protected $send=null;
	public function __construct($send)
	{
		$this->send=$send;
	}
	public abstract function msg($content);
	public function send($to,$content){//桥接
		$content=$this->msg($content);//加工
		$this->send->send($to,$content);
	}
}
//不同方式
class zn{
	public function send($to,$content)
	{
		echo '站内给:',$to,'--内容是:',$content;
	}
}
class email{
	public function send($to,$content)
	{
		echo 'email给:',$to,'--内容是:',$content;
	}
}
class sms{
	public function send($to,$content)
	{
		echo 'sms给:',$to,'--内容是:',$content;
	}
}
//不同级的info
class commoninfo extends info{
	public function msg($content)
	{
		return "普通:".$content;
	}
}
class warninfo extends info{
	public function msg($content)
	{
		return "紧急:".$content;
	}
}
class dangerinfo extends info{
	public function msg($content)
	{
		return "特急:".$content;
	}
}
//用站内发普通信息
$cinfo = new commoninfo(new zn());
$cinfo->send('小明','吃饭了');
echo "\n";
//用sms发紧急信息
$winfo = new warninfo(new sms());
$winfo->send('小明','吃饭了');