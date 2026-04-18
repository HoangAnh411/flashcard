# FlashLearn - Flashcard Learning System

## Giới thiệu (Introduction)

**FlashLearn** là một hệ thống ứng dụng Web hỗ trợ học tập qua thẻ nhớ (Flashcard) được xây dựng trên nền tảng **Laravel 9**. Dự án cung cấp một giao diện chuyên nghiệp, gọn gàng và dễ sử dụng, giúp người dùng dễ dàng tạo, quản lý và ôn tập kiến thức một cách hiệu quả thông qua phương pháp học tập bằng thẻ nhớ.

---

## Tính năng chính (Features)

### Dashboard (Trang tổng quan)
- Hiển thị tổng quan số liệu: tổng số flashcard, số thẻ đã học, số thẻ chưa học, tổng danh mục.
- Thanh tiến trình tổng thể (Overall Progress) hiển thị phần trăm hoàn thành.
- Biểu đồ tiến trình chi tiết theo từng danh mục.
- Nút Quick Actions để truy cập nhanh các chức năng.

### Quản lý Danh mục (Category Management)
- Tạo, sửa, xóa các danh mục để phân loại flashcard.
- Hiển thị số lượng flashcard trong mỗi danh mục.
- Cảnh báo rõ ràng khi xóa danh mục (tất cả flashcard bên trong sẽ bị xóa theo).

### Quản lý Flashcard (Flashcard Management)
- Thêm, sửa, xóa flashcard với câu hỏi (Question) và câu trả lời (Answer).
- Mỗi flashcard thuộc về một danh mục cụ thể.
- Trạng thái học tập: Learned (đã thuộc) / Learning (đang học).
- Hỗ trợ hiển thị nội dung xuống dòng (pre-wrap).
- Phân trang tự động (12 thẻ/trang).

### Tìm kiếm & Lọc (Search & Filter)
- Tìm kiếm flashcard theo nội dung câu hỏi hoặc câu trả lời.
- Lọc theo danh mục — tự động lọc ngay khi chọn, không cần bấm nút.
- Lọc theo trạng thái: All / Learned / Learning.

### Chế độ Học tập (Study Mode)
- Giao diện thẻ bài 3D có thể lật (Flip Card) — click để xem câu trả lời.
- Hỗ trợ phím tắt: `←` `→` để chuyển thẻ, `Space` / `Enter` để lật thẻ.
- Lọc theo danh mục và tùy chọn **"Only unlearned"** để chỉ học các thẻ chưa thuộc.
- Đánh dấu thẻ đã học (Mark as Learned) — lưu trạng thái qua API.
- Xáo trộn thứ tự thẻ (Shuffle) để ôn tập ngẫu nhiên.
- Thanh tiến trình (Progress Bar) theo dõi tiến độ.

### Giao diện (UI/UX)
- Thiết kế phẳng (Flat Design) chuẩn Enterprise, phong cách chuyên nghiệp.
- Responsive — hoạt động tốt trên cả máy tính và điện thoại.
- Modal xác nhận xóa với nội dung cảnh báo chi tiết.
- Flash message tự động ẩn sau 4 giây.

---

## 🛠 Công nghệ sử dụng (Tech Stack)

| Thành phần | Công nghệ |
|---|---|
| **Backend** | Laravel 9.x, PHP 8.0+ |
| **Cơ sở dữ liệu** | MySQL (XAMPP) |
| **Frontend** | Laravel Blade Template |
| **CSS** | Vanilla CSS (CSS thuần, không dùng framework) |
| **JavaScript** | Vanilla JS (không dùng framework) |
| **Kiến trúc** | MVC (Model - View - Controller) |

---

## Cấu trúc thư mục chính (Project Structure)

```
flashcard-app/
├── app/
│   ├── Http/Controllers/
│   │   ├── DashboardController.php    # Xử lý trang Dashboard
│   │   ├── FlashcardController.php    # CRUD Flashcard + Study Mode
│   │   └── CategoryController.php     # CRUD Category
│   └── Models/
│       ├── Flashcard.php              # Model Flashcard
│       └── Category.php               # Model Category
├── database/
│   ├── migrations/                    # Tạo bảng CSDL
│   └── seeders/
│       └── DatabaseSeeder.php         # Dữ liệu mẫu (8 danh mục, 87 flashcard)
├── resources/views/
│   ├── layouts/app.blade.php          # Layout chính (navbar, CSS, modal)
│   ├── dashboard.blade.php            # Trang Dashboard
│   ├── flashcards/
│   │   ├── index.blade.php            # Danh sách flashcard
│   │   ├── create.blade.php           # Form tạo flashcard
│   │   ├── edit.blade.php             # Form sửa flashcard
│   │   └── study.blade.php            # Chế độ học tập
│   └── categories/
│       ├── index.blade.php            # Danh sách danh mục
│       ├── create.blade.php           # Form tạo danh mục
│       └── edit.blade.php             # Form sửa danh mục
└── routes/web.php                     # Định tuyến URL
```

---

## Thiết kế Cơ sở dữ liệu (Database Design)

### Bảng `categories`
| Cột | Kiểu | Mô tả |
|---|---|---|
| id | bigint (PK) | Khóa chính, tự tăng |
| name | varchar(255) | Tên danh mục |
| created_at | timestamp | Thời gian tạo |
| updated_at | timestamp | Thời gian cập nhật |

### Bảng `flashcards`
| Cột | Kiểu | Mô tả |
|---|---|---|
| id | bigint (PK) | Khóa chính, tự tăng |
| question | text | Nội dung câu hỏi |
| answer | text | Nội dung câu trả lời |
| is_learned | boolean | Trạng thái đã học (mặc định: false) |
| category_id | bigint (FK) | Khóa ngoại liên kết tới bảng categories |
| created_at | timestamp | Thời gian tạo |
| updated_at | timestamp | Thời gian cập nhật |

**Quan hệ:** Category (1) ← → (N) Flashcard (Một danh mục chứa nhiều flashcard. Khi xóa danh mục, tất cả flashcard thuộc danh mục đó sẽ bị xóa theo — CASCADE DELETE).

---

## Hướng dẫn Cài đặt & Chạy dự án (Installation & Setup)

### Yêu cầu môi trường
- **XAMPP** (bao gồm PHP 8.0+ và MySQL)
- **Composer** (trình quản lý thư viện PHP)
- **Git**

### Các bước thực hiện

**1. Clone source code về máy**
```bash
git clone https://github.com/HoangAnh411/flashcard.git
cd flashcard
```

**2. Cài đặt các thư viện cần thiết**
```bash
composer install
```

**3. Cấu hình môi trường (.env)**

Tạo file `.env` từ file mẫu có sẵn:
```bash
copy .env.example .env
```

Mở file `.env` và cấu hình thông tin Database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flashcard_db
DB_USERNAME=root
DB_PASSWORD=
```

> **Lưu ý:** Cần bật MySQL trong XAMPP và tạo sẵn một database trống tên `flashcard_db` (có thể dùng phpMyAdmin tại `http://localhost/phpmyadmin`).

**4. Tạo mã khóa bảo mật (Application Key)**
```bash
php artisan key:generate
```

**5. Tạo bảng CSDL và nạp dữ liệu mẫu**
```bash
php artisan migrate --seed
```

Lệnh này sẽ tự động:
- Tạo 2 bảng: `categories` và `flashcards`.
- Nạp sẵn 8 danh mục và 87 flashcard mẫu để test.

**6. Khởi động ứng dụng**
```bash
php artisan serve
```

Mở trình duyệt và truy cập: **http://127.0.0.1:8000**

---

## Hướng dẫn sử dụng (Usage Guide)

### Trang Dashboard
- Truy cập trang chủ để xem tổng quan tiến độ học tập.
- Theo dõi phần trăm hoàn thành và tiến trình theo từng danh mục.

### Quản lý Danh mục
1. Chọn menu **Categories** trên thanh điều hướng.
2. Nhấn **New Category** để tạo danh mục mới (ví dụ: Toán, Lý, Hóa...).
3. Nhấn **Edit** để sửa tên hoặc **Delete** để xóa.

### Quản lý Flashcard
1. Chọn menu **Flashcards** trên thanh điều hướng.
2. Nhấn **New Flashcard**, điền câu hỏi, câu trả lời và chọn danh mục.
3. Sử dụng bộ lọc **Category** và **Status** để tìm kiếm nhanh.
4. Nhấn **Edit** để sửa hoặc **Delete** để xóa flashcard.

### Chế độ Học tập (Study Mode)
1. Từ trang Flashcards, nhấn nút **Study Mode**.
2. **Click vào tấm thẻ** để lật xem câu trả lời (hoặc nhấn phím `Space`/`Enter`).
3. Dùng nút **Previous** / **Next** để chuyển thẻ (hoặc phím `←` / `→`).
4. Nhấn **Mark as Learned** khi đã thuộc thẻ đó.
5. Nhấn **Shuffle** để xáo trộn thứ tự, giúp ôn tập hiệu quả hơn.
6. Tích chọn **Only unlearned** để chỉ hiển thị các thẻ chưa thuộc.

---

## Dữ liệu mẫu (Sample Data)

Sau khi chạy `php artisan migrate --seed`, hệ thống sẽ có sẵn:

| Danh mục | Số Flashcard |
|---|---|
| Programming | 15 |
| Science | 12 |
| History | 10 |
| Languages | 12 |
| Mathematics | 10 |
| Geography | 10 |
| Literature | 8 |
| Technology | 10 |
| **Tổng cộng** | **87** |
