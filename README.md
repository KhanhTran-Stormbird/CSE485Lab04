QUẢN LÝ BÁN HÀNG 
phân chia công việc:
Nguyễn Văn Quang:thiết kế cấu trúc thư mục,controller,debug,routing,seeding
Tạ Ngọc Hà(frontend):thiết kế giao diện,model,view,migration,testter,debug

cáu trúc :
shop-management/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php
│   │   │   ├── CustomerController.php
│   │   │   ├── OrderController.php
│   │   │   └── ProductController.php
│   ├── Models/
│   │   ├── Customer.php
│   │   ├── Order.php
│   │   ├── OrderDetail.php
│   │   └── Product.php
│
├── database/
│   ├── migrations/
│   │   ├── create_customers_table.php
│   │   ├── create_products_table.php
│   │   ├── create_orders_table.php
│   │   └── create_order_details_table.php
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── home.blade.php
│   │   ├── customers/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   
│   │   ├── products/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   
│   │   ├── orders/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── history.blade.php
│
├── routes/
│   ├── web.php

