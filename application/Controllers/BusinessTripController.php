<?php


class BusinessTripController extends Controller
{
    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        parent::__construct($db, $settings, $template);
    }

    public function listAction()
    {
        $businessTrips = $this->db->getAllBusinessTrips();

        $this->template->render('business-trips/list.html.php', ['businessTrips' => $businessTrips]);
    }

    public function jsonAction()
    {
        {
            $businessTrips = $this->db->getAllBusinessTrips();
            {
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($businessTrips, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            }
        }
    }
}