<?php


class Controller
{
    protected $db;
    protected $settings;
    protected $template;

    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');

        $this->db = $db;
        $this->settings = $settings;
        $this->template = $template;

        header('X-Frame-Options: SAMEORIGIN');
    }
}
