
# Quản Lý Thư Viện

Dự án này là một hệ thống quản lý thư viện, bao gồm các chức năng quản lý sách, độc giả và việc mượn sách. Dưới đây là các hướng dẫn cơ bản để cài đặt và chạy ứng dụng.

## Phân Công Bài Tập 1:

- **Trần Gia Khánh (Backend)**: Thiết kế cấu trúc thư mục, Models, Controllers, Debugging, Migration, Seeding.
- **Mai Sỹ Duy Khánh (Frontend)**: Thiết kế giao diện, Views, Routing, QA (Tester).

## Các bước cài đặt và chạy ứng dụng:

1. **Cài đặt các phụ thuộc (Dependencies)**:
   Chạy lệnh sau để cài đặt các gói phụ thuộc của Composer:

   ```bash
   composer install
   ```

2. **Tạo khóa mã hóa (Encryption Key)**:
   Chạy lệnh sau để tạo khóa mã hóa cho ứng dụng:

   ```bash
   php artisan key:generate
   ```

3. **Chạy Migration và Seeding**:
   Chạy lệnh sau để tạo cơ sở dữ liệu và seeding dữ liệu mẫu:

   ```bash
   php artisan migrate --seed
   ```

4. **Chạy ứng dụng**:
   Cuối cùng, chạy lệnh sau để khởi động ứng dụng:

   ```bash
   php artisan serve
   ```

Sau khi hoàn thành các bước trên, bạn có thể truy cập ứng dụng thông qua đường dẫn: `http://127.0.0.1:8000`.

## Các tính năng chính:

- Quản lý sách (Thêm, sửa, xóa sách).
- Quản lý độc giả (Thêm, sửa, xóa độc giả).
- Quản lý việc mượn sách (Thêm, sửa, xóa việc mượn sách).

## Cấu trúc thư mục:

```
.
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── ...
├── resources/
│   ├── views/
│   └── ...
├── routes/
│   ├── web.php
├── database/
│   ├── migrations/
│   └── seeders/
└── ...
```

## Công nghệ sử dụng:

- Laravel (PHP)
- MySQL
- Bootstrap (Frontend)
