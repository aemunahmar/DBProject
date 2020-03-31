use dealer_one;


Insert INTO representative (rep_no,name,address,phone,base_salary, ytd_sales,comm)
values ('R987', 'Frank Doe', '10 Broad St', '573-555-6666', '$60,000','$122,000','$56,000');


Insert INTO customer_d1 (customer_no,name,address,phone)
values ('C1234','Mary Jones','23 Hillside','573-555-2345');

Insert INTO rebate1 (model,amount,start_date,end_date)
values ('Rav4','$1,000','2014/02/01','2014/04/30');

Insert INTO rebate1 (model,amount,start_date,end_date)
values ('Camry','$0','0000/00/00','0000/00/00');

Insert INTO cars (serial_no,model,color,autotrans,warehouse)
values ( 'S11111','Rav4','Blue','yes','Bridgeport');

Insert INTO cars (serial_no,model,color,autotrans,warehouse)
values ( 'S13313','Camry','Red','no','st.Charles');

Insert INTO loan (serial_no,amount, start_date,end_date)
values('S13313','$10,000','2014/02/10','2019/02/20');

Insert INTO transaction (deal_no, rep_no,customer_no,serial_no,amount,fin_amt, date,rebate_amt)
values('T123456','R987','C1234','S13313','$20,000','$10,000','2014/02/10', '$1,500');

