<?php
//Code3-1
// 네임스페이스 추가 Controller
namespace OpenSeminar\Point;

use App\Http\Controllers\Controller as AppController;
use Request;
use XeDB;
use XePresenter;
use XeFrontend;
use XeConfig;
use Xpressengine\User\Models\User;

class Controller extends AppController
{
    // Code7-1
    // validation rule 추가
    protected $rules = [
        'board_point' => 'required|numeric',
    ];

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

        // Code7-3
        // XeFrontend::rule('config', $this->rules);

        // Code5-2
        // Skin 사용할 때 alias를 지정할 필요 없음
        // return XePresenter::make('index', ['paginate' => $paginate,]);

        return XePresenter::make('openseminar_point::index', [
            'paginate' => $paginate,
        ]);
        */

        return 'point index controller';
    }

    /* Code6-6
    public function update(Request $request)
    {
        // Code7-2
        // $this->validate($request, $this->rule);

        $config = XeConfig::get(Plugin::getId());

        $config->set('board_point', $request->get('board_point'));
        XeConfig::put(Plugin::getId(), $config->getPureAll());

        return redirect(route('openSeminar.point.settings.index'));
    }
    */
}