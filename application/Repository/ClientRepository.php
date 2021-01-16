<?php


class ClientRepository extends DatabaseModel
{
    private string $clientsTableName;

    public function __construct($dbSettings)
    {
        parent::__construct($dbSettings);

        $this->clientsTableName = 'clients';
    }


    public function getAllClients()
    {
        $result = $this->db->query('SELECT * FROM ' . $this->clientsTableName . ' WHERE is_deleted = false');

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClientById($id)
    {
        $query = 'SELECT * FROM ' . $this->clientsTableName . ' WHERE id = :id AND is_deleted = :is_deleted';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':is_deleted', false, PDO::PARAM_BOOL);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createClient($client)
    {
        $query = 'INSERT INTO ' . $this->clientsTableName . ' (nip, regon, name, is_vat, address_street_name, address_street_number, address_apartment_number, is_deleted)
         VALUES (:nip, :regon, :name, :is_vat, :address_street_name, :address_street_number, :address_apartment_number, :is_deleted)';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nip', $client['nip'], PDO::PARAM_STR);
        $stmt->bindValue(':regon', $client['regon'], PDO::PARAM_STR);
        $stmt->bindValue(':name', $client['name'], PDO::PARAM_STR);
        $stmt->bindValue(':is_vat', $client['is_vat'], PDO::PARAM_BOOL);
        $stmt->bindValue(':address_street_name', $client['address_street_name'], PDO::PARAM_STR);
        $stmt->bindValue(':address_street_number', $client['address_street_number'], PDO::PARAM_STR);
        $stmt->bindValue(':address_apartment_number', $client['address_apartment_number'], PDO::PARAM_STR);
        $stmt->bindValue(':is_deleted', false, PDO::PARAM_BOOL);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function updateClient($client)
    {
        $query = 'UPDATE ' . $this->clientsTableName . ' SET nip = :nip, regon = :regon, name = :name, is_vat = :is_vat,
         address_street_name = :address_street_name, address_street_number = :address_street_number, address_apartment_number = :address_apartment_number WHERE id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nip', $client['nip'], PDO::PARAM_STR);
        $stmt->bindValue(':regon', $client['regon'], PDO::PARAM_STR);
        $stmt->bindValue(':name', $client['name'], PDO::PARAM_STR);
        $stmt->bindValue(':is_vat', $client['is_vat'], PDO::PARAM_BOOL);
        $stmt->bindValue(':address_street_name', $client['address_street_name'], PDO::PARAM_STR);
        $stmt->bindValue(':address_street_number', $client['address_street_number'], PDO::PARAM_STR);
        $stmt->bindValue(':address_apartment_number', $client['address_apartment_number'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $client['id'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0)
        {
            return true;
        }

        return false;
    }

    public function deleteClient($id)
    {
        $query = 'UPDATE ' . $this->clientsTableName . ' SET is_deleted = :is_deleted WHERE id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':is_deleted', true, PDO::PARAM_BOOL);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0)
        {
            return true;
        }

        return false;
    }
}
