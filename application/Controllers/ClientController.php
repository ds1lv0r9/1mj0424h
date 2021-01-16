<?php


class ClientController extends Controller
{
    public function __construct(DatabaseModel $db, array $settings, Template $template)
    {
        parent::__construct($db, $settings, $template);
    }

    public function indexAction()
    {
        $businessTrips = $this->db->getAllClients();

        $this->template->render('clients/index.html.php', ['businessTrips' => $businessTrips]);
    }

    public function apiAction(int $id = -1)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'POST':
                // CREATE
                $client = [];
                if ($jsonData = json_decode(file_get_contents("php://input"), true))
                {
                    $client['nip'] = isset($jsonData['client']['nip']) ? $jsonData['client']['nip'] : '';
                    $client['regon'] = isset($jsonData['client']['regon']) ? $jsonData['client']['regon'] : '';
                    $client['name'] = isset($jsonData['client']['name']) ? $jsonData['client']['name'] : '';
                    $client['is_vat'] = isset($jsonData['client']['is_vat']) ? $jsonData['client']['is_vat'] : '';
                    $client['address_street_name'] = isset($jsonData['client']['address_street_name']) ? $jsonData['client']['address_street_name'] : '';
                    $client['address_street_number'] = isset($jsonData['client']['address_street_number']) ? $jsonData['client']['address_street_number'] : '';
                    $client['address_apartment_number'] = isset($jsonData['client']['address_apartment_number']) ? $jsonData['client']['address_apartment_number'] : '';
                }

                $id = $this->db->createClient($client);
                if ($id > 0)
                {
                    http_response_code(201);

                    $client = $this->db->getClientById($id);
                    unset($client['is_deleted']);

                    echo json_encode(['client' => $client], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                }
                else
                {
                    http_response_code(400);
                }
                break;
            case 'GET':
                // READ
                if ($id > 0)
                {
                    $client = $this->db->getClientById($id);

                    header('Content-type: application/json; charset=utf-8');

                    if (!$client)
                    {
                        http_response_code(404);
                        echo json_encode(['client' => []], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

                    }
                    else
                    {
                        http_response_code(200);
                        unset($client['is_deleted']);
                        echo json_encode(['client' => $client], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                    }
                }
                else
                {
                    $clients = $this->db->getAllClients();
                    {
                        header('Content-type: application/json; charset=utf-8');
                        http_response_code(200);
                        foreach ($clients as &$client)
                        {
                            unset($client['is_deleted']);
                        }
                        echo json_encode(['clients' => $clients], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                    }
                }
                break;
            case 'PUT':
                // UPDATE
                if ($id > 0)
                {
                    $client = [];
                    if ($jsonData = json_decode(file_get_contents("php://input"), true))
                    {
                        $client['id'] = $id;
                        $client['nip'] = isset($jsonData['client']['nip']) ? $jsonData['client']['nip'] : '';
                        $client['regon'] = isset($jsonData['client']['regon']) ? $jsonData['client']['regon'] : '';
                        $client['name'] = isset($jsonData['client']['name']) ? $jsonData['client']['name'] : '';
                        $client['is_vat'] = isset($jsonData['client']['is_vat']) ? $jsonData['client']['is_vat'] : '';
                        $client['address_street_name'] = isset($jsonData['client']['address_street_name']) ? $jsonData['client']['address_street_name'] : '';
                        $client['address_street_number'] = isset($jsonData['client']['address_street_number']) ? $jsonData['client']['address_street_number'] : '';
                        $client['address_apartment_number'] = isset($jsonData['client']['address_apartment_number']) ? $jsonData['client']['address_apartment_number'] : '';
                    }

                    if ($this->db->updateClient($client))
                    {
                        http_response_code(200);

                        $client = $this->db->getClientById($id);
                        unset($client['is_deleted']);

                        echo json_encode(['client' => $client], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                        die;
                    }
                }

                http_response_code(400);
                echo json_encode(['client' => []], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                break;
            case 'DELETE':
                // DELETE
                if ($this->db->deleteClient($id))
                {
                    http_response_code(204);
                }
                else
                {
                    http_response_code(404);
                }
                break;
            default:
                http_response_code(400);
                break;
        }
    }
}