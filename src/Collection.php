<?php


namespace Sonar200\Template;


use Ds\Vector;
use Iterator;

/**
 * Class Style
 *
 * @package Core\Base\Template
 *
 */
class Collection implements Iterator
{
    /** @var Collection */
    protected static Collection $instances;

    protected Vector $vector;
    protected int $increment = 0;

    protected function __construct() {
        $this->vector = new Vector();
    }

    /**
     * @param mixed $value
     */
    public function add($value)
    {
        if(!$this->vector->contains($value)){
            $this->vector->push($value);
        }
    }

    public function count()
    {
        return $this->vector->count();
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->vector->get($this->increment);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->increment++;

        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment);
        }

        return false;
    }

    public function prev()
    {
        $this->increment--;

        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment);
        }

        return false;
    }

    public function each()
    {
        if($this->vector->offsetExists($this->increment)){
            return $this->vector->get($this->increment++);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->increment;
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {

    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->increment = 0;
    }

    public function first()
    {
        return $this->vector->first();
    }

    public function last()
    {
        return $this->vector->last();
    }

    public static function getInstance()
    {
        $class = get_called_class();

        if (!empty(self::$instances)) {
            self::$instances = new $class;
        }
        return self::$instances;
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }
}