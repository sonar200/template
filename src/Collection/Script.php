<?php


namespace Sonar200\Template\Collection;


class Script extends CollectionItem
{
    public function getFullLink(array $params = []): string
    {
        $paramString = $this->getParamString($params);

        if(!empty($paramString)){
            return '<script type="text/javascript" src="' . $this->link . '?' . $paramString .'"></script>' . PHP_EOL;
        }
        else{
            return '<script type="text/javascript" src="' . $this->link . '"></script>' . PHP_EOL;
        }
    }
}