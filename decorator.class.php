<?php

//Decorator 装饰者模式做文件修饰功能
class BaseArt{
	protected $content;
	protected $art=null;
	public function __construct($ba,$content='')
	{
		$this->art=$ba;
		$this->content = $content;
	}
	public function decorator()
	{
		return $this->content;
	}
}
//编辑文章摘要
class BianArt extends BaseArt{
	// public function __construct($art)
	// {
	// 	$this->art=$art;
	// }
	public function decorator()
	{
		return $this->art->decorator().'<br/>小编加上文章摘要<br/>';
	}
}
//编辑文章SEO
class SeoArt extends BaseArt{
	// public function __construct($art)
	// {
	// 	$this->art=$art;
	// }
	public function decorator()
	{
		return $this->art->decorator().'<br/>加上SEO关键词<br/>';
	}
}


$ba=new BaseArt(null,'天天向上');
$x = new BianArt(new SeoArt($ba));
echo $x->decorator();
