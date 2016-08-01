<?php
//Code3-1
// 네임스페이스 추가 Controller
namespace OpenSeminar\Point;

use App\Http\Controllers\Controller as AppController;
use Request;
use XeDB;
use XePresenter;
use Xpressengine\User\Models\User;

class Controller extends AppController
{
    /* Code5-1
    // 스킨 사용 설정
    public function __construct()
    {
        XePresenter::setSkinTargetId(Plugin::getId());
    }
    */

    public function index()
    {
        /* Code3-6
        //
        $perPage = 20;
        $query = XeDB::table('point_logs');

        if (Request::get('displayName', '') != '') {
            $users = User::where('displayName', 'like', '%'.Request::get('displayName').'%')->get();
            $userIds = [];
            foreach (
                User::where('displayName', 'like', '%'.Request::get('displayName').'%')->get()
                as
                $item
            ) {
                $userIds[] = $item->getId();
            }
            $query->where('userId', 'in', sprintf("'%s'",join("','", $userIds)));
        }
        $paginate = $query->orderBy('createdAt', 'desc')->paginate($perPage);

        // Code5-2
        // Skin 사용할 때 alias를 지정할 필요 없음
        // return XePresenter::make('index', ['paginate' => $paginate,]);

        return XePresenter::make('openseminar_point::index', [
            'paginate' => $paginate,
        ]);
        */

        return 'point index controller';
    }
}