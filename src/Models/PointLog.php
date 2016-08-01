<?php
namespace OpenSeminar\Point\Models;

use Xpressengine\Database\Eloquent\DynamicModel;

class PointLog extends DynamicModel
{
    // point_log 테이블에 createdAt, updatedAt 같은 시간에 대한 컬럼을 사용하지 않음
    public $timestamps = false;
}
