<?php
//适配器模式 Adapter
class tianqi{
	public static function show()
	{
		$today = array('tep'=>28,'wind'=>7,'sun'=>'sunny');
		//echo serialize($today),"\n";
		return serialize($today);
	}
}
class AdapterTianqi extends tianqi{
	public static function show()
	{
		$today = parent::show();
		$today=unserialize($today);
		$today=json_encode($today);
		return $today;
	}
}
//client
$tq = unserialize(tianqi::show());
echo '温度:',$tq['tep'],"\n";
echo '风力:',$tq['wind'],"\n";
echo 'sun:',$tq['sun'],"\n";
echo "通过适配器调用 :\n";


echo AdapterTianqi::show(),"\n";
$tq = AdapterTianqi::show();
$tq = json_decode($tq);
echo '温度:',$tq->tep,"\n";
echo '风力:',$tq->wind,"\n";
echo 'sun:',$tq->sun,"\n";