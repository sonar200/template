<?php


namespace Sonar200\Template;


/**
 * Class StyleCollection
 *
 * @package Core\Base\Template
 *
 * @method static StyleCollection getInstance()
 * @method Style|false next()
 * @method Style|false prev()
 * @method Style|false each()
 * @method Style|false current()
 * @method Style|false first()
 * @method Style|false last()
 */
class StyleCollection extends Collection
{
    /**
     * @param mixed $style
     */
    public function add($style)
    {

        parent::add(new Style($style));
    }
}