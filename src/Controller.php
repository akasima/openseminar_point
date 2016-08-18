<?php
//Code3-1
namespace OpenSeminar\Point;

use App\Http\Controllers\Controller as AppController;
use XeDB;
use XePresenter;
use XeFrontend;
use XeConfig;
use Xpressengine\Http\Request;
use Xpressengine\User\Models\User;

class Controller extends AppController
{
    // Code8-1
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

    public function index(Request $request)
    {
        /* Code3-6
        //
        $perPage = 20;
        $query = XeDB::table('point_logs');

        if ($request->get('displayName', '') != '') {
            $userIds = [];
            foreach (
                User::where('displayName', 'like', '%'.$request->get('displayName').'%')->get()
                as
                $item
            ) {
                $userIds[] = $item->getId();
            }
            $query->whereIn('userId', $userIds);
        }
        $paginate = $query->orderBy('createdAt', 'desc')->paginate($perPage);

        // Code8-3
        // Frontend rule 설정, index4.blade.php 사용하도록 변경
//        XeFrontend::rule('config', $this->rules);
//        $config = $config = XeConfig::get(Plugin::getId());
//        return XePresenter::make('index4', ['paginate' => $paginate,'title' => 'Point log 스킨','config'=>$config]);

        // Code7-1
        // index3.blade.php 사용하도록 변경
//        $config = $config = XeConfig::get(Plugin::getId());
//        return XePresenter::make('index3', ['paginate' => $paginate,'title' => 'Point log 스킨','config'=>$config]);

        // Code6-7
        // index2.blade.php 사용하도록 변경
//        $config = $config = XeConfig::get(Plugin::getId());
//        return XePresenter::make('index2', ['paginate' => $paginate,'title' => 'Point log 스킨','config'=>$config]);

        // Code5-2
        // Skin 사용할 때 alias를 지정할 필요 없음
//        return XePresenter::make('index', ['paginate' => $paginate,'title' => 'Point log 스킨',]);

        return XePresenter::make('openseminar_point::views.index', [
            'title' => 'Point log',
            'paginate' => $paginate,
        ]);
        */

        return 'point index controller';
    }

    /* Code6-6
    public function update(Request $request)
    {
        // Code8-2
        $this->validate($request, $this->rules);

        $config = XeConfig::get(Plugin::getId());

        $config->set('board_point', $request->get('board_point'));
        XeConfig::put(Plugin::getId(), $config->getPureAll());

        return redirect(route('openSeminar.point.settings.index'));
    }
    */
}