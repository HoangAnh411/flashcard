# FlashLearn - Flashcard Learning System

## Giới thiệu (Introduction)
**FlashLearn** là một hệ thống ứng dụng Web hỗ trợ học tập qua thẻ nhớ (Flashcard) được xây dựng trên nền tảng Laravel. Dự án cung cấp một giao diện chuyên nghiệp, gọn gàng và dễ sử dụng, giúp người dùng dễ dàng tạo, quản lý và ôn tập kiến thức một cách hiệu quả.

## Tính năng nổi bật (Features)
- **Quản lý Danh mục (Category Management):** Tổ chức flashcard theo từng chủ đề hoặc môn học.
- **Quản lý Flashcard:** Thêm, sửa, xóa các thẻ nhớ với hỗ trợ định dạng xuống dòng chi tiết.
- **Màn hình Học tập (Study Mode):** 
  - Giao diện thẻ bài 3D có thể lật (Flip-card) tương tác trực quan.
  - Theo dõi tiến độ học tập bằng thanh Progress Bar.
  - Tính năng đánh dấu thẻ đã học ("Mark as Learned").
  - Chức năng xáo trộn thẻ (Shuffle) để ôn tập ngẫu nhiên.
- **Tìm kiếm & Lọc:** Tìm kiếm nội dung nhanh chóng và lọc flashcard theo danh mục tự động.
- **Giao diện Responsive:** Thiết kế phẳng (Flat Design) chuẩn Enterprise, hoạt động tốt trên cả máy tính và điện thoại.

## Công nghệ sử dụng (Tech Stack)
- **Backend:** Laravel 9.x, PHP 8.0+
- **Cơ sở dữ liệu:** MySQL
- **Frontend:** Laravel Blade, CSS thuần (Vanilla CSS), JavaScript thuần

---

## Hướng dẫn Cài đặt & Chạy dự án (Installation & Setup)

**Yêu cầu môi trường:**
- Cài đặt XAMPP (chứa sẵn PHP 8.0+ và MySQL).
- Cài đặt Composer.

**Các bước thực hiện:**

1. **Clone source code về máy**
   ```bash
   git clone https://github.com/HoangAnh411/flashcard.git
   cd flashcard
   ```

2. **Cài đặt các thư viện cần thiết**
   ```bash
   composer install
   ```

3. **Cấu hình môi trường (.env)**
   Tạo file `.env` từ file mẫu có sẵn:
   ```bash
   copy .env.example .env
   ```
   Sau đó, mở file `.env` lên và cấu hình thông tin Database. Hãy đảm bảo bạn đã bật MySQL trong XAMPP và tạo sẵn một database trống tên là `flashcard_db`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=flashcard_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Tạo mã khóa bảo mật (Application Key)**
   ```bash
   php artisan key:generate
   ```

5. **Tạo bảng CSDL và nạp dữ liệu mẫu**
   Lệnh này sẽ tự động tạo các bảng và chèn sẵn một số Danh mục, Flashcard để bạn test thử:
   ```bash
   php artisan migrate --seed
   ```

6. **Khởi động ứng dụng**
   ```bash
   php artisan serve
   ```
   Mở trình duyệt và truy cập vào địa chỉ: **http://127.0.0.1:8000**

---

## Hướng dẫn sử dụng (Usage Guide)
1. **Tạo Danh mục:** Chọn menu `Categories` ở góc trên bên phải, nhấn `New Category` để tạo các chủ đề (vd: Tiếng Anh, Lịch sử, IT...).
2. **Tạo Flashcard:** Chọn menu `Flashcards`, nhấn `New Flashcard`, điền câu hỏi, câu trả lời và chọn danh mục tương ứng.
3. **Ôn tập (Study Mode):** 
   - Từ màn hình Flashcards, nhấn nút `Study Mode`.
   - Click chuột vào tấm thẻ trên màn hình để lật xem câu trả lời.
   - Dùng các nút `Previous` / `Next` để chuyển thẻ.
   - Nhấn `Mark as Learned` nếu bạn đã thuộc thẻ đó.
   - Nhấn `Shuffle` để xáo trộn thứ tự các thẻ, giúp việc ôn tập không bị nhàm chán.
