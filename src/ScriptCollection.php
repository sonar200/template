<?php


namespace Sonar200\Template;


/**
 * Class StyleCollection
 *
 * @package Core\Base\Template
 *
 * @method static ScriptCollection getInstance()
 * @method Script|false next()
 * @method Script|false prev()
 * @method Script|false each()
 * @method Script|false current()
 * @method Script|false first()
 * @method Script|false last()
 */
class ScriptCollection extends Collection
{
    /**
     * @param mixed $script
     */
    public function add($script)
    {
        parent::add(new Script($script));
    }
}