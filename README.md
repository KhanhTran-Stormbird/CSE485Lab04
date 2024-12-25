# Quản Lý Bán Hàng

Dự án này là một hệ thống quản lý bán hàng, bao gồm các chức năng quản lý sản phẩm, khách hàng và các giao dịch mua bán. Dưới đây là các hướng dẫn cơ bản để cài đặt và chạy ứng dụng.

## Phân Chia Công Việc:

- **Nguyễn Văn Quang**: Thiết kế cấu trúc thư mục, Controller, Debugging, Routing, Seeding.
- **Tạ Ngọc Hà (Frontend)**: Thiết kế giao diện, Model, View, Migration, Tester, Debugging.

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

- Quản lý sản phẩm (Thêm, sửa, xóa sản phẩm).
- Quản lý khách hàng (Thêm, sửa, xóa khách hàng).
- Quản lý giao dịch (Thêm, sửa, xóa giao dịch mua bán).

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


