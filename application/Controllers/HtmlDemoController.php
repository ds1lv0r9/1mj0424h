<?php


class HtmlDemoController extends Controller
{
    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        parent::__construct($db, $settings, $template);
    }

    public function listAction()
    {
        $this->template->render('html-demo/list.html.php', []);
    }
}