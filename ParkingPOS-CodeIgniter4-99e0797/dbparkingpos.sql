CREATE TABLE account {
	id_account int NOT NULL UNIQUE,
	full_name varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY (id_account)
}

INSERT INTO 'account' ('id_account', 'full_name', 'email', 'password') VALUES
(1, 'John Cena', 'johncena@abc.com', 'e0e55c6a367500793d8d492722c1a9bb'),
(2, 'Dwayne Johnson', 'djohnson@abc.com', '2a4e6d91a342fc800e9aabb8945a3361'),
(3, 'Nirmala Indah', 'indah_nirmala@abc.com', '88e29d41634d7ce6baafd215a55b5fc0'),
(4, 'Sri Susila', 'srisusila@abc.com', '68a53b7c4a32815ecd7f55758643d79e')
(5, 'Surya Adi', 'suryadi@abc.com', '92add218b7647afb4de31cc73c99918e')
(6, 'Raja Mahmud', 'kingmahmud@abc.com', 'fee4a006cb1906882d151d22ff99d7bc'),
(7, 'Hannah Ferguson', 'fergusonhannah@abc.com', '41f68f4032c0fc50ad4ee1f0e68364ec'),
(8, 'Thea Stuart', 'theas@abc.com', '1969ed0ac1ef58f9573c6fe16bcd0023'),
(9, 'Mehmet Demir', 'mehmet.demir@abc.com', '42b013f72eb2823e671c873a4c5ddb5c'),
(10, 'Nesip Sami', 'nsami@abc.com', '39858e0943272b8b7e22526d8c40f356')


CREATE TABLE vehicle {
	id_vehicle int NOT NULL UNIQUE,
	vehicle_type varchar(255) NOT NULL,
	brand varchar(255) NOT NULL,
	model varchar(255) NOT NULL,
	plate_number varchar(255) NOT NULL
	PRIMARY KEY (id_vehicle)
}

INSERT INTO 'vehicle' ('id_vehicle', 'vehicle_type', 'brand', 'model', 'plate_number') VALUES
(1, 'Motor', 'Ducati', 'Streetfighter V4S', 'B 1 A'),
(2, 'Motor', 'KTM', 'KTM 350 EXC-F', 'B 1 B'),
(3, 'Mobil', 'Lamborghini', 'Urus', 'B 1 C'),
(4, 'Mobil', 'Lamborghini', 'Aventador', 'B 1 D'),
(5, 'Mobil', 'Audi', 'A8', 'B 1 E'),
(6, 'Motor', 'Harley Davidson', 'Iron 883', 'B 1 F'),
(7, 'Mobil', 'Lamborghini', 'Aventador', 'B 1 G'),
(8, 'Motor', 'Harley Davidson', '2022 Fat Bob', 'B 1 H'),
(9, 'Mobil', 'Lamborghini', 'Huracan', 'B 1 I'),
(10, 'Mobil', 'Ferrari', 'SF90-Spider', 'B 1 J'),
(11, 'Mobil', 'Mitsubishi', '2022 Eclipse Cross', 'B 1 K'),
(12, 'Mobil', 'Mitsubishi', 'Lancer', 'B 1 L'),
(13, 'Mobil', 'Ferrari', 'F8 Spider', 'B 1 M'),
(14, 'Motor', 'Ducati', 'Multistrada 950S', 'B 1 N')

CREATE TABLE 'account_vehicle' {
	id_account int NOT NULL,
	id_vehicle int NOT NULL,
	plate_number varchar(255) NOT NULL,
}

INSERT INTO 'account_vehicle' ('id_account', 'id_vehicle', 'plate_number') VALUES
(1, 1, 'B 1 A'),
(2, 2, 'B 1 B'),
(3, 2, 'B 1 B'),
(4, 3, 'B 1 C'),
(4, 4, 'B 1 D'),
(5, 5, 'B 1 E'),
(6, 6, 'B 1 F'),
(6, 7, 'B 1 G'),
(6, 8, 'B 1 H'),
(6, 9, 'B 1 I'),
(7, 8, 'B 1 H'),
(8, 10, 'B 1 J'),
(8, 11, 'B 1 K'),
(9, 12, 'B 1 L'),
(10, 13, 'B 1 M'),
(10, 14, 'B 1 N')

CREATE TABLE place {
	id_place int NOT NULL UNIQUE,
	name_of_place varchar(255) NOT NULL,
	location varchar(255) NOT NULL,
	availability int NOT NULL,
	capacity int NOT NULL,
	price int NOT NULL,
	PRIMARY KEY (id_place)
}

INSERT INTO 'place' ('id_place', 'name_of_place', 'location', 'availability', 'capacity', 'price') VALUES
(1, 'Grand Indonesia', 'Central Jakarta', 4300, 4300, 3000),
(2, 'Plaza Senayan', 'Central Jakarta', 3500, 3500, 3000),
(3, 'Senayan City', 'Central Jakarta', 5000, 5000, 3000)


CREATE TABLE 'vehicle_place' {
	id_vehicle int NOT NULL,
	id_place int NOT NULL,
	vehicle_type varchar(255) NOT NULL,
	plate_number varchar(255) NOT NULL,
	check_in timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	check_out timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	total_price int
}