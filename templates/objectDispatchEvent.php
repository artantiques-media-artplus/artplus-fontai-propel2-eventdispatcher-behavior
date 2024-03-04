protected function dispatchEvent(string $subject)
{
    global $kernel;

    if (!$kernel)
    {
      return;
    }

    $event = new PropelEvent($this);

    $kernel->getContainer()->get('event_dispatcher')->dispatch($event, $subject);
}
