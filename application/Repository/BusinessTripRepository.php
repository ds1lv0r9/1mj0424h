<?php


class BusinessTripRepository extends DatabaseModel
{
    private string $businessTripsTableName;

    public function __construct($dbSettings)
    {
        parent::__construct($dbSettings);

        $this->businessTripsTableName = 'business_trips';
    }


    public function getAllBusinessTrips()
    {
        $result = $this->db->query('SELECT * FROM ' . $this->businessTripsTableName);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}