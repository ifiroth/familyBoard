<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionManager
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack) {

        $this->requestStack = $requestStack;
    }

    public function addPlannedActivityForm(?int $id = null, $form): bool {

        $forms = $this->getPlannedActivityForms();
        $forms[$id] = $form;

        $session = $this->requestStack->getSession();
        $session->set('plannedActivityForms', $forms);

        return true;
    }

    public function getPlannedActivityForms(?int $id = null): array
    {
        $session = $this->requestStack->getSession();
        $forms = $session->get( 'plannedActivityForms', []);

        if ($id === null) {
            return $forms;

        } else {
            return (isset($forms[$id]))? $forms[$id] : [];
        }
    }

    public function removePlannedActivityForm(int $id): bool
    {
        if ($this->getPlannedActivityForms($id)) {

            $session = $this->requestStack->getSession();
            $forms = $session->get( 'plannedActivityForms', []);
            unset($forms[$id]);
            $session->set('plannedActivityForms', $forms);

            return true;

        } else {

            return false;
        }
    }
}
