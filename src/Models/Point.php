<?php
namespace OpenSeminar\Point\Models;

use Xpressengine\Database\Eloquent\DynamicModel;

class Point extends DynamicModel
{
    // point 테이블은 primary key 컬럼 이름을 userId 로 사용함
    // Laravel 에서 기본 primary key 컴럼 이름은 id 이기 때문에 다른 이름으로 할 경우 처리해 줘야함
    protected $primaryKey = 'userId';

    public $incrementing = false;

    protected $fillable = [
        'userId', 'point',
    ];

}
