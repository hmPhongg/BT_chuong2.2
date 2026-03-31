Cấu trúc Repository
Dự án được chia thành 3 thư mục tương ứng với 3 bài tập chính:

1. [Bài 1] Quản lý sinh viên (/bai1_qlsv)
Mục tiêu: Xây dựng CRUD sinh viên cơ bản.

Tính năng:

Áp dụng chuẩn mô hình MVC (Route -> Controller -> Model -> View).

Validation dữ liệu (Email không được trùng).

Phân trang (Pagination) và Sắp xếp danh sách theo tên.

Tìm kiếm sinh viên theo tên.

2. [Bài 2] Quản lý kho sản phẩm (/bai2_qlsp)
Mục tiêu: Quản lý tồn kho và trạng thái hàng hóa.

Tính năng:

CRUD sản phẩm (Tên, Giá, Số lượng, Danh mục).

Logic tồn kho: Tự động hiển thị nhãn (Badge) trạng thái: Hết hàng, Sắp hết hàng (<5), hoặc Còn hàng.

Chức năng xóa sản phẩm kèm cảnh báo xác nhận.

3. [Bài 3] Đăng ký môn học (/bai3_dkmh)
Mục tiêu: Xử lý quan hệ bảng (Relationship) và Logic nghiệp vụ phức tạp.

Tính năng:

Quản lý Sinh viên, Môn học và Đăng ký (Enrollment).

Logic ràng buộc: Chặn đăng ký trùng môn học cho cùng một sinh viên.

Logic tín chỉ: Giới hạn tối đa 18 tín chỉ cho mỗi sinh viên. Hệ thống sẽ báo lỗi nếu vượt quá định mức.

🛠 Hướng dẫn cài đặt 
Để chạy được dự án trên máy cục bộ, vui lòng thực hiện các bước sau cho từng thư mục bài tập:

Di chuyển vào thư mục bài tập:

Bash
cd [ten_thu_muc_bai_tap]
Cài đặt thư viện (Vendor):

Bash
composer install
Cấu hình môi trường:

Tạo file .env từ file mẫu: cp .env.example .env

Cấu hình Database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) trong file .env.

Khởi tạo Database và Key:

Bash
php artisan key:generate
php artisan migrate
Khởi động server:

Bash
php artisan serve
 Công nghệ sử dụng
Backend: Laravel Framework (PHP 8.x)

Frontend: Blade Template Engine, Bootstrap 5 (CDN)

Database: MySQL (XAMPP)
