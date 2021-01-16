<?php

require_once 'application/manuload.php';

$config = new Configuration();
$settings = $config->getSettings();

$databaseModel = new DatabaseModel($settings['db_settings']);
$businessTripRepository = new BusinessTripRepository($settings['db_settings']);
$clientRepository = new ClientRepository($settings['db_settings']);

$template = new Template();

$businessTripController = new BusinessTripController($businessTripRepository, $settings, $template);
$clientController = new ClientController($clientRepository, $settings, $template);
$employeesController = new EmployeesController($databaseModel, $settings, $template);
$htmlDemoController = new HtmlDemoController($databaseModel, $settings, $template);
$vatController = new VatController($databaseModel, $settings, $template);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$pattern = '/(?:\/{0,1})(?:\/(index\.php){0,1}clients\/api\/)(\d+)$/';
$string = $uri;
$matches = [];

if (preg_match($pattern, $string, $matches))
{
    $id = $matches[count($matches) - 1];

    $clientController->apiAction($id);
}
else
{
    switch ($uri)
    {
        case '/':
        case BASE_URI:
        case BASE_URI . '/':
        case BASE_URI . '/html-demo':
            $htmlDemoController->listAction();
            break;
        case BASE_URI . '/employees':
            $employeesController->listAction();
            break;
        case BASE_URI . '/vat':
            $vatController->listAction();
            break;
        case BASE_URI . '/business-trip':
            $businessTripController->listAction();
            break;
        case BASE_URI . '/business-trip/json':
            $businessTripController->jsonAction();
            break;
        case BASE_URI . '/clients':
            $clientController->indexAction();
            break;
        case BASE_URI . '/clients/api':
            $clientController->apiAction();
            break;

        default:
            header('HTTP/1.1 404 Not Found');
            echo '<html><body>[404] Page not found</body></html>';
            break;
    }
}