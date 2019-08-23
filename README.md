# agendajob
Simple agenda to save contacts

File to connect to database: connection.php

Database settings:

CREATE DATABASE AGENDA;

CREATE TABLE USERMASTER (
   id_user int(11) NOT NULL AUTO_INCREMENT,
   fst_name_user varchar(50),
   lst_name_user varchar(50),
   postal_code_user varchar(20),
   city_user varchar(30),
   state_user varchar(10),
   country_user varchar(40),
   email_user varchar(100),
   passwd_user varchar(50),
   PRIMARY KEY(id_user)
);

CREATE TABLE CONTACTS(
   id_cont int(11) NOT NULL AUTO_INCREMENT,
   fk_id_user int(11) NOT NULL,
   fst_name_cont varchar(50),
   mid_name_cont varchar(50),
   lst_name_cont varchar(50),
   webpage_cont varchar(100),
   job_title_cont varchar(50),
   gender_cont varchar(10),
   birthday_cont varchar(10),
   email_cont varchar(100),
   main_phone_number varchar(20),
   main_postal_code_cont varchar(20),
   main_city_cont varchar(30),
   main_state_cont varchar(10),
   main_country_cont varchar(50),
   main_street_name_cont varchar(50),
   main_number_st_cont varchar(10),
   PRIMARY KEY(id_cont),
   FOREIGN KEY (fk_id_user) REFERENCES USER(id_user)
);

CREATE TABLE PHONE_CONTACTS_ALT(
   id_phone_cont int(11) NOT NULL AUTO_INCREMENT,
   fk_id_cont int(11) NOT NULL,
   phone_number_cont varchar(20),
   PRIMARY KEY(id_phone_cont),
   FOREIGN KEY (fk_id_cont) REFERENCES CONTACTS(id_cont)
);

CREATE TABLE ADDRESS_CONTACTS_ALT(
   id_addr_cont int(11) NOT NULL AUTO_INCREMENT,
   fk_id_cont int(11) NOT NULL,
   postal_code_cont varchar(20),
   city_cont varchar(30),
   street_name_cont varchar(50),
   number_st_cont varchar(10),
   state_cont varchar(10),
   country_cont varchar(50),
   PRIMARY KEY(id_addr_cont),
   FOREIGN KEY (fk_id_cont) REFERENCES CONTACTS(id_cont)
);

Use the example.csv to test in the app!
