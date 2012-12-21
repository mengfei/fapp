<?php
class Tag
{
	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/',trim(tags),-1,PREG_SPLIT_NO_EMPTY);
	}

	public static function array2string($tags)
	{
		return implode(",",$tags);
	}
}
?>