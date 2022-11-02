<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionManager
{
    private array $modes = ['view', 'edit'];
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack) {

        $this->requestStack = $requestStack;
    }

    public function addActivity(int $id, string $mode): bool {

        if (!in_array($mode, $this->modes)) {
            return false;
        }

        $activities = $this->getActivities($mode);

        if (!in_array($id, $activities)) {
            $activities[] = $id;

            $session = $this->requestStack->getSession();
            $session->set($mode .'Activities', $activities);
        }

        return true;
    }

    public function getActivities($mode): array
    {
        if (!in_array($mode, $this->modes)) {
            return [];
        }

        $session = $this->requestStack->getSession();

        return $session->get($mode .'Activities', []);
    }

    public function removeActivity(int $id, string $mode): bool
    {
        if (!in_array($mode, $this->modes)) {

            return false;
        }

        $activities = $this->getActivities($mode);

        if (in_array($id, $activities)) {
            $key = array_search($id, $activities);

            unset($activities[$key]);

            $session = $this->requestStack->getSession();
            $session->set($mode .'Activities', $activities);

            return true;

        } else {

            return false;
        }
    }
}
