<?php
namespace Fontai\Propel\Behavior\EventDispatcher;

use Propel\Generator\Builder\Om\ObjectBuilder;
use Propel\Generator\Model\Behavior;


class EventDispatcherBehavior extends Behavior
{
  public function objectAttributes(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectAttributes', [
      'classPath' => strtolower($builder->getStubObjectBuilder()->getClasspath())
    ]);
  }

  public function objectMethods(ObjectBuilder $builder)
  {
    $builder->declareClasses('Fontai\\Propel\\Behavior\\EventDispatcher\\Event\\PropelEvent');

    return $this->renderTemplate('objectDispatchEvent');
  }

  public function preInsert(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'PRE_INSERT'
    ]);
  }

  public function postInsert(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'POST_INSERT'
    ]);
  }

  public function preUpdate(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'PRE_UPDATE'
    ]);
  }

  public function postUpdate(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'POST_UPDATE'
    ]);
  }

  public function preSave(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'PRE_SAVE'
    ]);
  }

  public function postSave(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'POST_SAVE'
    ]);
  }

  public function preDelete(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'PRE_DELETE'
    ]);
  }

  public function postDelete(ObjectBuilder $builder)
  {
    return $this->renderTemplate('objectHook', [
      'event' => 'POST_DELETE'
    ]);
  }
}