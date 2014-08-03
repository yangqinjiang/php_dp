<?php

//桥接模式 bridge
//论坛给用户发信息可以是站内容,email.手机
interface msg{
	public function send($to,$content);
}
class zn implements msg{
	public function send($to,$content)
	{
		echo "站内信给:",$to,"  内容:",$content;
	}
}
class email implements msg{
	public function send($to,$content)
	{
		echo "email给:",$to,"  内容:",$content;
	}
}
class sms implements msg{
	public function send($to,$content)
	{
		echo "短信给:",$to,"  内容:",$content;
	}
}
//内容可分普通,加急,特急等
// class zncommon extends msg
//引起类爆炸