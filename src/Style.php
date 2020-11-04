<?php


namespace Sonar200\Template;


use Config;

/**
 * Class Style
 *
 * @package Core\Base\Template
 */
class Style
{
    /** @var string */
    public string $link;

    /**
     * Style constructor.
     *
     * @param string $link
     */
    public function __construct(string $link) { $this->link = $link; }

    /**
     * @return string
     */
    public function getFullLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }
}