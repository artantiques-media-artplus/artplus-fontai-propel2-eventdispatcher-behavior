<?php
namespace Fontai\Propel\Behavior\EventDispatcher\Event;

use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Symfony\Contracts\EventDispatcher\Event;


class PropelEvent extends Event
{
  const NAME = 'propel.event';
  
  protected $object;
  
  public function __construct(ActiveRecordInterface $object)
  {
    $this->object = $object;
  }
  
  public function getObject()
  {
    return $this->object;
  }

  public function __call($name, $arguments)
  {
    $class = explode('\\', get_class($this->object));

    if ($name == sprintf('get%s', end($class)))
    {
      return $this->object;
    }
  }
}