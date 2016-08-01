<?php
namespace OpenSeminar\Point;

use Auth;
use OpenSeminar\Controller;
use OpenSeminar\Point\Models\PointLog;
use Schema;
use Illuminate\Database\Schema\Blueprint;
use XeFrontend;
use XePresenter;
use Route;
use Xpressengine\Config\ConfigEntity;
use Xpressengine\Http\Request;
use Xpressengine\Plugin\AbstractPlugin;
use Xpressengine\Plugins\Board\Handler as BoardHandler;
use Xpressengine\User\UserInterface;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();

        /* Code2-2
        // 인터셉트 등록
        $this->registerBoardIntercept();
        */

        /* Code3-3
        // 인터셉트 등록
        $this->registerSettingsMenu();
        */

        /* Code3-5
        // 관리자 페이지 라우트 등록
        $this->registerSettingsRoute();
        */
    }

    protected function route()
    {
        // implement code

        Route::fixed(
            $this->getId(),
            function () {
                Route::get(
                    '/',
                    [
                        'as' => 'openseminar_point::index',
                        'uses' => function (Request $request) {

                            $title = '오픈세미나 포인트 플러그인';

                            // set browser title
                            XeFrontend::title($title);

                            // load css file
                            XeFrontend::css($this->asset('assets/style.css'))->load();

                            // output
                            return XePresenter::make('openseminar_point::views.index', ['title' => $title]);

                        }
                    ]
                );
            }
        );

    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code

        parent::activate($installedVersion);
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code
        /* Code1-2
        // install 할 때 테이블이 설치될 수 있도록 메소드 실행
        $this->createTables();
        */

        parent::install();
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @param string $installedVersion 이 플러그인의 현재 설치된 버전정보
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled($installedVersion = null)
    {
        // implement code

        return parent::checkInstalled($installedVersion);
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function update($installedVersion = null)
    {
        // implement code

        parent::update($installedVersion);
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @param string $currentVersion 현재 설치된 버전
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated($currentVersion = null)
    {
        return true;
    }

    /* Code1-1
    // 테이블 설치 코드 추가
    protected function createTables()
    {
        // make create table
        if (Schema::hasTable('points') === false) {
            Schema::create('points', function (Blueprint $table) {
                $table->engine = "InnoDB";

            });
        }

        if (Schema::hasTable('point_logs') === false) {
            Schema::create('point_logs', function (Blueprint $table) {
                $table->engine = "InnoDB";

            });
        }
    }
    */

    /* Code2-1
    // 게시판 인터셉트 등록
    protected function registerBoardIntercept()
    {
        intercept(
            BoardHandler::class . '@add',
            static::getId() . '::board.add',
            function ($addFunc, array $args, UserInterface $user, ConfigEntity $config) {

                $board = $addFunc($args, $user, $config);

                // 게시물 저장 후 포인트 적립
                $addPoint = 5;
                if (Auth::check()) {
                    $user = Auth::user();
                    XeDB::table('point_logs')->insert([
                        'userId' => $user->getId(),
                        'point' => $addPoint,
                    ]);

                    $point = XeDB::table('point_logs')->where('userId', $user->getId())->sum('point');

                    if (XeDB::table('points')->where('userId', $user->getId())->exists() === true) {
                        XeDB::table('points')->where('userId', $user->getId())->update([
                            'point' => $point,
                        ]);
                    } else {
                        XeDB::table('points')->insert([
                            'userId' => $user->getId(),
                            'point' => $point,
                        ]);
                    }
                }
            }
        );
    }
    */

    ///* Code4-1
    // 게시판 인터셉트 등록 코드 개선. ORM 사용
    protected function registerBoardIntercept2()
    {
        intercept(
            BoardHandler::class . '@add',
            static::getId() . '::board.add',
            function ($addFunc, array $args, UserInterface $user, ConfigEntity $config) {

                $board = $addFunc($args, $user, $config);

                // 게시물 저장 후 포인트 적립
                $addPoint = 5;
                if (Auth::check()) {
                    $user = Auth::user();

                    PointLog::save([

                    ]);
//                    XeDB::table('point_logs')->insert([
//                        'userId' => $user->getId(),
//                        'point' => $addPoint,
//                    ]);

                    $point = XeDB::table('point_logs')->where('userId', $user->getId())->sum('point');

                    if (XeDB::table('points')->where('userId', $user->getId())->exists() === true) {
                        XeDB::table('points')->where('userId', $user->getId())->update([
                            'point' => $point,
                        ]);
                    } else {
                        XeDB::table('points')->insert([
                            'userId' => $user->getId(),
                            'point' => $point,
                        ]);
                    }
                }
            }
        );
    }
    //*/

    /* Code3-2
    // 관리자 메뉴에 추가 될 수 있도록 수정
    protected function registerSettingsMenu()
    {
        // settings menu 등록
        $menus = [
            'contents.openSeminar.point' => [
                'title' => 'point',
                'display' => true,
                'description' => '',
                'ordering' => 2000  // 정렬 순서
            ],
        ];
        foreach ($menus as $id => $menu) {
            app('xe.register')->push('settings/menu', $id, $menu);
        }
    }
    */

    /* Code 3-4
    // 관리자 페이지 라우트 등록
    protected function registerSettingsRoute()
    {
        Route::settings(self::getId(), function () {
            Route::get('docs', [
                'as' => 'openSeminar.point.settings.index',
                'uses' => 'Controller@docsIndex',
                'settings_menu' => 'contents.openSeminar.point'
            ]);
        }, ['namespace' => 'OpenSeminar\Point']);
    }
    */
}