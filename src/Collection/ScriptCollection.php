<?php


namespace Sonar200\Template\Collection;


use Sonar200\Collection\CollectionSingleton;

/**
 * Class StyleCollection
 *
 * @package Core\Base\Template
 *
 * @method Script|false next()
 * @method Script|false current()
 */
class ScriptCollection extends CollectionSingleton
{
    /**
     * @param mixed $script
     */
    public function add($script)
    {
        parent::add(new Script($script));
    }
}