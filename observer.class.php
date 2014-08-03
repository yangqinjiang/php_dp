<?php
//php实现观察者模式
//php5提供观察者observer与被观察者subject的接口
class User implements SplSubject{
	public $lognum;
	public $hobby;
	//存储观察员
	protected $observers = null;

	public function __construct($hobby)
	{
		$this->lognum=rand(1,10);
		$this->hobby=$hobby;
		$this->observers = new SplObjectStorage();
	}
	public function login(){
		//操作session..
		$this->notify();
	}
	public function attach(SPLObserver $observer){
		$this->observers->attach($observer);
	}
	public function detach(SPLObserver $observer)
	{
		$this->observers->detach($observer);	
	}
	public function  notify(){
		$this->observers->rewind();
		while ($this->observers->valid()) {
			$observer = $this->observers->current();
			$observer->update($this);
			$this->observers->next();
		}
	}
}
//观察者
class Secrity implements SplObserver{
	public function update(SplSubject $subject)
	{
		if($subject->lognum<3){
			echo "这是第".$subject->lognum."次安全登陆\n";
		}else{
			echo "这是第".$subject->lognum."次登陆,异常\n";
		}
	}
}
class Ad implements SplObserver{
	public function update(SplSubject $subject)
	{
		if($subject->hobby == 'sports'){
			echo "台球门票预定\n";
		}else{
			echo "好好学习,天天向上\n";
		}
	}
}
//client 实施观察
$user =new User('sports');
$user->attach(new Secrity());
$user->attach(new Ad());
$user->login();