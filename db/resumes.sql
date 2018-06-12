AppChallenge 3 User register
This app allow users to 
-Insert user information

-Allow the admin to see all user information

Extra
-See user information
-Allow Admin to print one user information
-Allow Admin to print all the users information

Candidates
				id_candidate 
				id_document
				full_name
				date_birth
				gender
				birth_place
				id_number
				address
				phone1
				phone2
				email
				career
				hours_available
				experience
				spanish_language
				english_language 
				created_date

Document
				id_document
				document_name
				path_storage
				uploaded_date


create database resumes;

use resumes;

create table candidates(
				id_candidate int auto_increment,
				id_document int not null,
				full_name varchar(50),
				date_birth date,
				gender varchar(10),
				birth_place varchar(50),
				id_number varchar(50),
				address varchar(50),
				phone1 varchar(20),
				phone2 varchar(20),
				email varchar(30),
				career varchar(20),
				hours_available int(20),
				experience varchar(5),
				spanish_language varchar(10),
				english_language varchar(10),
				created_date datetime,
				primary key(id_candidate)
					);

create table documents(
				id_document int auto_increment,
				document_name varchar(100),
				path_storage varchar(100),
				uploaded_date datetime,
				primary key(id_document)
					);
