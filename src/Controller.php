<?php
//Code3-1
// 네임스페이스 추가 Controller
namespace OpenSeminar;

use App\Http\Controllers\Controller as AppController;
use Request;
use XeDB;
use XePresenter;

class Controller extends AppController
{
    public function index()
    {
        /* Code3-6
        //
        $perPage = 20;
        $query = XeDB::table('point_logs');

        if (Request::get('displayName', '') != '') {
            $query->where('displayName', '=', Request::get('displayName'));
        }
        $paginate = $query->orderBy('createdAt', 'desc')->paginate($perPage);

        return XePresenter('openseminar_point::index', [
            'paginate' => $paginate,
        ]);
        */

        return 'point index controller';
    }
}