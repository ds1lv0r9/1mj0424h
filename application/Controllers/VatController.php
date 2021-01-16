<?php


class VatController extends Controller
{
    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        parent::__construct($db, $settings, $template);
    }

    public function listAction()
    {
        $this->template->render('vat/list.html.php', []);
    }
}