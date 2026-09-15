-- Create Database

CREATE DATABASE hostel_management;

USE hostel_management;



-- ================= ADMIN TABLE =================

CREATE TABLE admin (

    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100)

);



INSERT INTO admin(username,password,email)

VALUES

('admin','admin123','admin@kdhostel.com');





-- ================= STUDENT TABLE =================


CREATE TABLE students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100),

    enrollment_no VARCHAR(50),

    course VARCHAR(100),

    semester VARCHAR(20),

    mobile VARCHAR(15),

    email VARCHAR(100),

    password VARCHAR(100),

    room_no VARCHAR(20)

);




INSERT INTO students
(name,enrollment_no,course,semester,mobile,email,password,room_no)

VALUES

(
'Shubh Patel',
'KD2026001',
'Diploma Computer Engineering',
'4th Semester',
'9876543210',
'student@gmail.com',
'12345',
'101'
);





-- ================= ROOM TABLE =================


CREATE TABLE rooms (

    id INT AUTO_INCREMENT PRIMARY KEY,

    room_no int(20),

    block_name VARCHAR(50),

    floor VARCHAR(20), 

    capacity INT,

    occupied INT,

    status VARCHAR(20)

);




INSERT INTO rooms

(room_no,block_name,floor,capacity,occupied,status)

VALUES

('101','A Block','1st Floor',3,1,'Available'),

('102','A Block','1st Floor',3,3,'Occupied');







-- ================= FEES TABLE =================


CREATE TABLE fees (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,

    total_fee INT,

    paid_amount INT,

    pending_amount INT,

    payment_status VARCHAR(20),

    payment_date DATE

);



INSERT INTO fees

(student_id,total_fee,paid_amount,pending_amount,payment_status,payment_date)

VALUES

(1,25000,25000,0,'Paid','2026-07-20');







-- ================= COMPLAINT TABLE =================


CREATE TABLE complaints (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,

    category VARCHAR(50),

    complaint TEXT,

    date DATE,

    status VARCHAR(20),

    reply TEXT

);



INSERT INTO complaints

(student_id,category,complaint,date,status,reply)

VALUES

(
1,
'Room Issue',
'Fan Not Working',
'2026-07-22',
'Pending',
'Waiting For Reply'
);








-- ================= NOTICE TABLE =================


CREATE TABLE notices (

    id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(100),

    category VARCHAR(50),

    description TEXT,

    publish_date DATE

);



INSERT INTO notices

(title,category,description,publish_date)

VALUES

(
'Hostel Fee Payment Last Date',
'Fee Notice',
'Pay hostel fees before last date',
'2026-07-22'
);


-- ================= ROOM ALLOCATION HISTORY TABLE =================

CREATE TABLE room_allocation_history (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,

    room_no VARCHAR(20),

    allocation_date DATE,

    deallocation_date DATE,

    status VARCHAR(20),

    FOREIGN KEY (student_id) REFERENCES students(id)

);


-- ================= STAFF TABLE =================

CREATE TABLE staff (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100),

    designation VARCHAR(50),

    mobile VARCHAR(15),

    email VARCHAR(100),

    address TEXT,

    joining_date DATE,

    salary DECIMAL(10,2),

    status VARCHAR(20)

);


INSERT INTO staff

(name,designation,mobile,email,address,joining_date,salary,status)

VALUES

(
'Rajesh Kumar',
'Warden',
'9876543211',
'warden@kdhostel.com',
'Staff Quarter, KDH',
'2026-01-15',
'25000.00',
'Active'
);


-- ================= VISITOR MANAGEMENT TABLE =================

CREATE TABLE visitors (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,

    visitor_name VARCHAR(100),

    visitor_mobile VARCHAR(15),

    relation VARCHAR(50),

    purpose TEXT,

    visit_date DATE,

    in_time TIME,

    out_time TIME,

    status VARCHAR(20),

    FOREIGN KEY (student_id) REFERENCES students(id)

);


-- ================= ATTENDANCE TABLE =================

CREATE TABLE attendance (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT,

    date DATE,

    status VARCHAR(20),

    check_in TIME,

    check_out TIME,

    remarks TEXT,

    FOREIGN KEY (student_id) REFERENCES students(id)
);


