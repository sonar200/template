<?php


namespace Sonar200\Template\Collection;


use Sonar200\Collection\CollectionSingleton;

/**
 * Class StyleCollection
 *
 * @package Core\Base\Template
 *
 * @method Style|false next()
 * @method Style|false current()
 */
class StyleCollection extends CollectionSingleton
{
    /**
     * @param mixed $value
     */
    public function add($value)
    {

        parent::add(new Style($value));
    }
}