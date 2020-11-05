<?php


namespace Sonar200\Template\Collection;


abstract class CollectionItem
{
    /**
     * @var string
     */
    protected string $link;

    /**
     * CollectionItemScript constructor.
     *
     * @param string $link
     */
    public function __construct(string $link)
    {
        $this->link = $link;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    abstract function getFullLink(array $params = []): string;

    protected function getParamString(array $params = []): string
    {
        if (!empty($params)) {
            $paramString = [];

            foreach ($params as $index => $param) {
                array_push($paramString, $index . '=' . $param);
            }

            return implode('&', $paramString);
        }

        return '';
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }
}