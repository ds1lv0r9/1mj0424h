CREATE TABLE some_database.business_trips (
	id INT NOT NULL AUTO_INCREMENT,
	first_name varchar(100) NULL,
	last_name varchar(100) NULL,
	date_from TIMESTAMP NULL,
	date_to TIMESTAMP NULL,
	departure varchar(100) NULL,
	destination varchar(100) NULL,
    PRIMARY KEY (id)
)
ENGINE=InnoDB
AUTO_INCREMENT=0
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Emil', 'Piekarski', '2020-10-30 00:00:00', '2020-11-07 00:00:00', 'Poznań', 'Wrocław');

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Kondrat', 'Malak', '2020-11-07 00:00:00', '2020-11-21 00:00:00', 'Leszno', 'Warszawa');

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Mariusz', 'Kubica', '2020-10-30 00:00:00', '2020-11-13 00:00:00', 'Warszawa', 'Poznań');

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Gerwazy', 'Skalka', '2020-11-13 00:00:00', '2020-11-21 00:00:00', 'Wrocław', 'Leszno');

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Narcyz', 'Blazek', '2020-11-13 00:00:00', '2020-11-30 00:00:00', 'Poznań', 'Zielona Góra');

INSERT INTO some_database.business_trips
(first_name, last_name, date_from, date_to, departure, destination)
VALUES('Włodzimierz', 'Pelc', '2020-11-02 00:00:00', '2020-11-15 00:00:00', 'Zielona Góra', 'Warszawa');


CREATE TABLE some_database.clients
(
	id INT NOT NULL AUTO_INCREMENT,
	nip varchar(10) NULL,
	regon varchar(14) NULL,
	name varchar(100) NULL,
	is_vat bit(1) NULL,
	address_street_name varchar(100) NULL,
	address_street_number varchar(100) NULL,
    address_apartment_number varchar(100) NULL,
    is_deleted bit(1) NULL,
    PRIMARY KEY (id)
)
ENGINE=InnoDB
AUTO_INCREMENT=0
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

INSERT INTO some_database.clients
(nip, regon, name, is_vat, address_street_name, address_street_number, address_apartment_number, is_deleted)
VALUES('1234567890', '123456789', 'Firma 1', 1, 'Ulica ąćęłńóśżź', '2', '3', 0);

INSERT INTO some_database.clients
(nip, regon, name, is_vat, address_street_name, address_street_number, address_apartment_number, is_deleted)
VALUES('1234567891', '12345678901234', 'Firma 2', 0, 'Aleja', '4', '5', 0);

INSERT INTO some_database.clients
(nip, regon, name, is_vat, address_street_name, address_street_number, address_apartment_number, is_deleted)
VALUES('1234567891', '12345678901234', 'Firma usunięta', 0, 'Pokątna', '4', '5', 1);





