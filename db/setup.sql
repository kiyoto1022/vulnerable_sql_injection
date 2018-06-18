CREATE DATABASE sql_injection;

CREATE TABLE sql_injection.account (
  name VARCHAR(50),
  password varchar(50)
);

INSERT INTO sql_injection.account (name, password) VALUES ('admin', 'admin001#');
INSERT INTO sql_injection.account (name, password) VALUES ('guest', 'guest');

CREATE TABLE sql_injection.credit_card (
  name VARCHAR(50),
  card_number VARCHAR(50)
);

INSERT INTO sql_injection.credit_card (name, card_number) VALUES ('admin', '1111-2222-3333-4444');