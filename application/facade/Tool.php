<?php

namespace app\facade;

class Tool extends \think\Facade{

	protected static function getFacadeClass(){

		return 'app\cmodule\Tool';
	}
}