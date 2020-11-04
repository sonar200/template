<?php


namespace Sonar200\Template;


class Script
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