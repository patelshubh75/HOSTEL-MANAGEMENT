-- Populate Rooms 101-130 with Capacity 3 across 5 Floors
-- Each floor has 6 rooms (101-106 on 1st floor, 107-112 on 2nd floor, etc.)

USE hostel_management;

-- Clear existing rooms (optional - uncomment if needed)
-- TRUNCATE TABLE rooms;

-- Insert rooms for 1st Floor (101-106)
INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) VALUES
(101, 'A Block', '1st Floor', 3, 0, 'Available'),
(102, 'A Block', '1st Floor', 3, 0, 'Available'),
(103, 'A Block', '1st Floor', 3, 0, 'Available'),
(104, 'A Block', '1st Floor', 3, 0, 'Available'),
(105, 'A Block', '1st Floor', 3, 0, 'Available'),
(106, 'A Block', '1st Floor', 3, 0, 'Available');

-- Insert rooms for 2nd Floor (107-112)
INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) VALUES
(107, 'A Block', '2nd Floor', 3, 0, 'Available'),
(108, 'A Block', '2nd Floor', 3, 0, 'Available'),
(109, 'A Block', '2nd Floor', 3, 0, 'Available'),
(110, 'A Block', '2nd Floor', 3, 0, 'Available'),
(111, 'A Block', '2nd Floor', 3, 0, 'Available'),
(112, 'A Block', '2nd Floor', 3, 0, 'Available');

-- Insert rooms for 3rd Floor (113-118)
INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) VALUES
(113, 'A Block', '3rd Floor', 3, 0, 'Available'),
(114, 'A Block', '3rd Floor', 3, 0, 'Available'),
(115, 'A Block', '3rd Floor', 3, 0, 'Available'),
(116, 'A Block', '3rd Floor', 3, 0, 'Available'),
(117, 'A Block', '3rd Floor', 3, 0, 'Available'),
(118, 'A Block', '3rd Floor', 3, 0, 'Available');

-- Insert rooms for 4th Floor (119-124)
INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) VALUES
(119, 'A Block', '4th Floor', 3, 0, 'Available'),
(120, 'A Block', '4th Floor', 3, 0, 'Available'),
(121, 'A Block', '4th Floor', 3, 0, 'Available'),
(122, 'A Block', '4th Floor', 3, 0, 'Available'),
(123, 'A Block', '4th Floor', 3, 0, 'Available'),
(124, 'A Block', '4th Floor', 3, 0, 'Available');

-- Insert rooms for 5th Floor (125-130)
INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) VALUES
(125, 'A Block', '5th Floor', 3, 0, 'Available'),
(126, 'A Block', '5th Floor', 3, 0, 'Available'),
(127, 'A Block', '5th Floor', 3, 0, 'Available'),
(128, 'A Block', '5th Floor', 3, 0, 'Available'),
(129, 'A Block', '5th Floor', 3, 0, 'Available'),
(130, 'A Block', '5th Floor', 3, 0, 'Available');

-- Verify the rooms
SELECT * FROM rooms ORDER BY room_no;
