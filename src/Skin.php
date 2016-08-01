<?php
namespace OpenSeminar\Point;

use View;
use Xpressengine\Skin\AbstractSkin;

class Skin extends AbstractSkin
{
    protected static $skinAlias = 'openseminar_point::views.skin';

    /**
     * render
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return $view = View::make(sprintf('%s.%s', static::$skinAlias, $this->view), $this->data);
    }
}
