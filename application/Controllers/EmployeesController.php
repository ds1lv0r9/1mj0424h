<?php


class EmployeesController extends Controller
{
    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        parent::__construct($db, $settings, $template);
    }

    public function listAction()
    {
        $this->template->render('employees/list.html.php', []);
    }
}