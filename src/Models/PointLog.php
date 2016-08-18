<?php
namespace OpenSeminar\Point\Models;

use Xpressengine\Database\Eloquent\DynamicModel;

class PointLog extends DynamicModel
{
    public $timestamps = false;

    protected $fillable = [
        'userId', 'point', 'createdAt',
    ];
}
