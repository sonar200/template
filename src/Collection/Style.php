<?php


namespace Sonar200\Template\Collection;


/**
 * Class Style
 *
 * @package Core\Base\Template
 */
class Style extends CollectionItem
{
    /**
     * @param array $params
     *
     * @return string
     */
    public function getFullLink(array $params = []): string
    {
        $paramString = $this->getParamString($params);

        if(!empty($paramString)){
            return '<link rel="stylesheet" href="' . $this->link . '?' . $paramString .'" type="text/css" media="all" />' . PHP_EOL;
        }
        else{
            return '<link rel="stylesheet" href="' . $this->link . '" type="text/css" media="all" />' . PHP_EOL;
        }
    }
}