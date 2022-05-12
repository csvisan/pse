<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionManager
{
  private $requestStack;

  public function __construct(RequestStack $requestStack)
  {
    $this->requestStack = $requestStack;
  }

  public function setIsAdmin(bool $status)
  {
    $session = $this->requestStack->getSession();

    $session->set('isAdmin', $status);
  }

  public function isLogged(): bool
  {
    $session = $this->requestStack->getSession();

    return $session->get('isAdmin') == true;
  }
}
