<?php
class CutStr{

	public static function cutStr($str,$length=38){
		if(strlen($str)>$length)
			$subStr=mb_strcut($str,0,$length,'utf-8').'......';
		else
			$subStr=$str;	
		return $subStr;
	}
	public static function subStr($str,$length){
		if(strlen($str)>$length)
			$subStr=mb_strcut($str,0,$length,'utf-8');
		else
			$subStr=$str;	
		return $subStr;
	}
}