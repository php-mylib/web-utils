<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-19
 * Time: 9:12
 */

namespace Toolkit\Web\Traits;

use Toolkit\Web\ViewRenderer;

/**
 * Trait ViewRendererAwareTrait
 * @package Toolkit\Web\Traits
 */
trait ViewRendererAwareTrait
{
    /**
     * getRenderer
     * @return ViewRenderer
     */
    abstract public function getRenderer(): ViewRenderer;

    /**
     * @param string $view
     * @return string
     */
    protected function resolveView(string $view): string
    {
        return $view;
    }

    /*********************************************************************************
     * view method
     *********************************************************************************/

    /**
     * @param string $view
     * @param array $data
     * @param null|string $layout
     * @return string
     * @throws \Throwable
     */
    public function render(string $view, array $data = [], $layout = null): string
    {
        return $this->getRenderer()->render($this->resolveView($view), $data, $layout);
    }

    /**
     * @param string $view
     * @param array $data
     * @return string
     * @throws \Throwable
     */
    public function renderPartial($view, array $data = []): string
    {
        return $this->getRenderer()->fetch($this->resolveView($view), $data);
    }

    /**
     * @param string $string
     * @param array $data
     * @param null|string $layout
     * @return string
     * @throws \Throwable
     */
    public function renderContent($string, array $data = [], $layout = null): string
    {
        return $this->getRenderer()->renderContent($string, $data, $layout);
    }

}
