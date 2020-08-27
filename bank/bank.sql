
---USER ACCOUNTS TABLE----
create table users(
    id int AUTO_INCREMENT primary key,
    username varchar(30),
    password varchar(30),
    acc_no int(20),
    FOREIGN key(acc_no) REFERENCES accounts(acc_no)
);
insert into users values(1,'karunyav','karunyam',912345678);
insert into users values(2,'nikki28','nikkipreet',912345677);
insert into users values(3,'bhar11','bhargavipwd',912345676);
insert into users values(4,'sanju05','musicheals',912345675);
insert into users values(5,'karthik_v','Intelligence123',912345674);


-----ACCOUNTS TABLE-----
create table accounts (
    acc_no int(20) PRIMARY KEY not null,
    acc_type varchar(20) not null,
    balance int,
    branch int,
    FOREIGN KEY (branch) REFERENCES branch(branch_id)
);

insert into accounts VALUES(912345678,'savings',10000,1);
insert into accounts VALUES(912345677,'current',20000,5);
insert into accounts VALUES(912345676,'savings',15000,5);
insert into accounts VALUES(912345675,'current',30000,3);
insert into accounts VALUES(912345674,'savings',60000,1);

-----BRANCH TABLE-----
create table branch (
    branch_id int primary key,
    name varchar(50)
);

insert into branch values(1,'Vadavalli');
insert into branch values(2,'Pudur');
insert into branch values(3,'R S Puram');
insert into branch VALUES(4,'Gandhipuram');
INSERT INTO branch VALUES(5,'Peelamedu');


-----CUSTOMER TABLE-----
CREATE TABLE customer (
    cust_id int PRIMARY KEY not null,
    firstname varchar(20) not null,
    lastname varchar(20),
    dob date not null,
    gender varchar(20) not null,
    contact varchar(10) not null,
    email varchar(50) not null,
    address varchar(50),
    aadhar varchar(20),
    pan varchar(20),
    acc_no int(20),
    FOREIGN KEY(acc_no) REFERENCES accounts(acc_no)
);

insert into customer VALUES(1,'Karunya','Venugopalan','01-05-2001','female',6379029783,'karunya.venugopalan@gmail.com','no.5, e.b.colony, vadavalli, coimbatore, 641041', '123456789123','ABCDE1234F',912345678);
insert into customer VALUES(2,'Nikkitha','GS','28-10-2000','female',6379024578,'gsnikk@gmail.com','no.3, coral street, peelamedu, coimbatore, 641041', '123456789122','ABCDE1235F',912345677);
insert into customer VALUES(3,'Bhargavi','Madhavan','10-11-2000','female',8939029783,'bhargavi1110@gmail.com','no.12, Caramel Street, peelamedu, coimbatore, 641041', '123456789121','ABCDE1236F',912345676);
insert into customer VALUES(4,'Sanjana','Sanju','05-08-2000','female',6373880783,'sanju05@gmail.com','no.6, Ganga Street, RS Puram, coimbatore, 641041', '123456789120','ABCDE1237F',912345675);
insert into customer VALUES(5,'Karthik','Venugopalan','07-05-2000','male',6373880614,'karthik.venugopalan@gmail.com','no.5, e.b.colony, vadavalli, coimbatore, 641041', '123456789129','ABCDE1238F',912345674);


-----TRANSACTIONS TABLE-----
CREATE TABLE transactions (
    transaction_id int primary key AUTO_INCREMENT not null,
    acc_no int(20) not null,
    date date not null,
    checkno int(30) not null,
    remarks varchar(50) not null,
    withdrawal_amt int DEFAULT 0,
    deposit_amt int DEFAULT 0,
    FOREIGN KEY(acc_no) REFERENCES accounts(acc_no)
);

insert into transactions VALUES (1,912345678,'2020-04-19',123123123, "atm withdrawal",1000,0);
insert into transactions VALUES (2,912345678,'2020-04-14',123123119, "atm deposit",0,1500);
insert into transactions VALUES (3,912345674,'2020-04-14',123123110, "atm deposit",0,1500);
insert into transactions VALUES (4,912345676,'2020-04-20',123123133, "withdrawal",700,0);
insert into transactions VALUES (5,912345675,'2020-04-20',123123153, "deposit",0,2500);

-----FIXED DEPOSITS TABLE-----
CREATE TABLE fixedDeposits (
    fd_id int primary key AUTO_INCREMENT not null,
    acc_no int not null,
    date date not null,
    period int not null,
    interest_rate int not null,
    amount int not null,
    FOREIGN KEY(acc_no) REFERENCES accounts(acc_no)
);

insert into fixeddeposits VALUES (1,912345678,'2020-04-18',12,5,1000);
insert into fixeddeposits VALUES (2,912345677,'2020-04-11',12,3,1500);
insert into fixeddeposits VALUES (3,912345675,'2020-04-28',12,5,1000);
insert into fixeddeposits VALUES (4,912345676,'2020-04-03',12,3,2000);


-----LOANS TABLE-----
CREATE TABLE loans(
    loan_id int AUTO_INCREMENT PRIMARY KEY NOT null,
    acc_no int not null,
    type varchar(20) not null,
    principal_amt int not null,
    period int not null,
    emi int not null,
    FOREIGN KEY(acc_no) REFERENCES accounts(acc_no)
);
-----LOANS TABLE-----
CREATE TABLE loans(
    load_id int AUTO_INCREMENT PRIMARY KEY NOT null,
    acc_no int not null,
    type varchar(20) not null,
    principal_amt int not null,
    period int not null,
    emi int not null,
    interest_rate int,
    FOREIGN KEY(acc_no) REFERENCES accounts(acc_no)
);

insert into loans values(1,123456789,'educational',10000,24,1119,7);
insert into loans values(2,123456789,'home',20000,12,2169,7.5);


--1
DELIMITER $
create PROCEDURE select_userid(IN name varchar(30))
BEGIN
    SELECT id FROM users where username=name;
END
$


--2
DELIMITER $
create PROCEDURE select_useraccno(IN name varchar(30))
BEGIN
    SELECT acc_no FROM users where username=name;
END
$

--3
DELIMITER $
create PROCEDURE select_useridpwd(IN name varchar(30))
BEGIN
    SELECT id FROM users where password=name;
END
$

--4
DELIMITER $
CREATE PROCEDURE update_rec_bal(IN accno int, IN amt int)
BEGIN
    UPDATE accounts set balance=balance+amt where acc_no=accno;
END
$

--5
DELIMITER $
create PROCEDURE insert_rec_trans(IN accno int, IN amt int, IN description varchar(50))
BEGIN
    insert into transactions(acc_no,remarks,deposit_amt) values (accno,description,amt);
END
$

--6
DELIMITER $
CREATE PROCEDURE update_sender_bal(IN accno int, IN amt int)
BEGIN
    UPDATE accounts set balance=balance-amt where acc_no=accno;
END
$

--7
DELIMITER $
create PROCEDURE insert_sender_trans(IN accno int, IN amt int, IN description varchar(50))
BEGIN
    insert into transactions(acc_no,remarks,withdrawal_amt) values (accno,description,amt);
END
$


--8
DELIMITER $
CREATE PROCEDURE fdinsert(IN amt int, IN period int, IN accno int, IN interest int, IN date date)
BEGIN
    insert into fixeddeposits(acc_no,date,period,interest_rate,amount) VALUES (accno,date,period,interest,amt);
END
$

--9
DELIMITER $
create PROCEDURE fd_balupdate(IN accno int, IN amt int)
BEGIN
    update accounts set balance=balance-amt where acc_no=accno;
END
$

--10
DELIMITER $
CREATE PROCEDURE fd_transinsert(IN accno int, IN date date, IN remarks varchar(50), IN amt int)
BEGIN   
    insert into transactions(acc_no,date,remarks,withdrawal_amt) values (accno,date,remarks,amt);
END
$

