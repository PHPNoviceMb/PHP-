<?php

namespace app\test\model;

use think\model\concern\SoftDelete;

//后台基础模型类
class System extends \think\Model{

	//软删除
	use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

}