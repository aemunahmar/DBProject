create database dealer_one;
use dealer_one;



create table representative 
(	
	rep_no              varchar(5) NOT NULL, #unique id for representative 
    name                varchar(20) NOT NULL, #name of the representative
    address             varchar(20) NOT NULL, #address of representative
    phone				varchar(15) NOT NULL, #phone number of representative
    base_salary			varchar(11) NOT NULL, # base salary for the representative
    ytd_sales			varchar(11) NOT NULL, # year to date amount for the representative
    comm				varchar(11) NOT NULL, # commission for the representative
    
    
    PRIMARY KEY (rep_no)
);

create table customer_d1
(	
	customer_no        varchar(5) NOT NULL, #unique id for the customer 
    name                varchar(20) NOT NULL, #name of the customer
    address             varchar(20) NOT NULL, #address of customer
    phone				varchar(15) NOT NULL, #phone number of customer
    
    PRIMARY KEY (customer_no)
);



create table rebate1
(
	model               varchar(10) NOT NULL, #unique model for car
    amount				varchar(11) NOT NULL, #how much the rebate1 is
    start_date 			DATE	   NOT NULL, # start date of rebate1
    end_date 			DATE	   NOT NULL, # end date of the rebate1
    
    PRIMARY KEY(model)
);

create table cars
(
	serial_no			varchar(6) NOT NULL, #Unique id for car
    model               varchar(10) NOT NULL, #unique model for car
	color				varchar(10) NOT NULL, #color of the car 
    autotrans			varchar(3)	NOT NUll, # yes or no if its autotransmission
    warehouse			varchar(20) NOT NULL, # warehouse city
	
    PRIMARY KEY  (serial_no),
    FOREIGN KEY(model) REFERENCES rebate1(model)
);

create table loan
(
	serial_no			varchar(6) NOT NULL, #Unique id for car
    amount				varchar(11) NOT NULL, #how much the loan is
    start_date 			DATE	   NOT NULL, # start date of loan
    end_date 			DATE	   NOT NULL, # end date of the loan
    
    FOREIGN KEY(serial_no) REFERENCES cars(serial_no)
);

create table transaction
(
	deal_no	            varchar(7) NOT NULL, #Unique id for transaction
    rep_no              varchar(4) NOT NULL, #unique id for representative 
    customer_no		    varchar(5) NOT NULL, #unique id for the customer
    serial_no			varchar(6) NOT NULL, #Unique id for car
	amount				varchar(11) NOT NULL, #how much the transaction is
	fin_amt			    varchar(11) NOT NULL, #the balance left 
    date                DATE 	    NOT NULL, #Date of transaction
    rebate_amt			varchar(11) NOT NULL, #the the rebate amount
    
    PRIMARY KEY(deal_no),
    FOREIGN KEY(rep_no) REFERENCES representative(rep_no),
    FOREIGN KEY(customer_no) REFERENCES customer_d1(customer_no),
    FOREIGN KEY(serial_no) REFERENCES cars(serial_no)
);


