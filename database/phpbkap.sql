-- Chú ý tạo DATABASE và chọn DATABASE sau đó chạy lệnh sql sưới đây hoặc sử dụng chức năng imporrt

-- Tạo bảng province
CREATE TABLE IF NOT EXISTS province (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL UNIQUE
);

-- Thêm mưới dữ liệu mẫu vào bảng province
INSERT INTO province(name) VALUES
('Hà Nội'),
('Lào Cai'),
('Yên Bãi'),
('Hải phòng');

-- Tạo bảng people
CREATE TABLE IF NOT EXISTS people (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  province_id int(11) NOT NULL,
  avatar varchar(255) NOT NULL,
  birthday date NOT NULL,
  gender tinyint(1) DEFAULT '0' COMMENT 'Giới tính giá trị 0 là nữ, 1 là nam',
  about text
);
-- Tạo khóa ngoại từ bảng people tới bảng province
ALTER TABLE people ADD FOREIGN KEY FK_people_province(province_id) REFERENCES province(id);