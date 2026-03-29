# Laravel 12 Expert Skill

## Description
Kỹ năng chuyên gia về Laravel 12, hỗ trợ viết code chuẩn Performance, Security và tuân thủ các tính năng mới nhất của PHP 8.3+.

## Instruction (Chỉ dẫn cho Agent)
- Luôn ưu tiên dùng **Laravel 12 Service Classes** để xử lý Business Logic.
- Khi tạo Migration, luôn thêm `comment()` cho các cột để giải thích ý nghĩa.
- Sử dụng **Eloquent API Resources** khi trả về dữ liệu JSON cho Frontend.
- Đối với dự án "Quản lý Tour":
    - Luôn kiểm tra `status` của Tour trước khi cho phép đặt chỗ.
    - Tự động gợi ý các Tour liên quan dựa trên địa điểm (Location).
- Code backend xong thì thêm vào route luôn giúp tôi và sử dụng name và dùng route vào đường dẫn luôn
### 🚀 Workflow: Auto-Routing & Link Sync
Mỗi khi hoàn thành logic Backend (Controller/Method), Agent phải thực hiện quy trình "Nối mạch hệ thống" sau:

1. **Tự động cấu hình Route:**
   - Sau khi viết xong Method trong Controller, hãy ngay lập tức mở file `routes/web.php`.
   - Khởi tạo Route tương ứng. Ví dụ: `Route::get('/danh-sach-tin-tuc', [TinTucController::class, 'index'])->name('tintuc.index');`.
   - **Quy tắc đặt tên (Naming Convention):** Luôn sử dụng `name('tên_bảng.hành_động')` để quản lý route chuyên nghiệp.

2. **Cập nhật liên kết (href) trong Blade:**
   - Quét toàn bộ các file Blade liên quan (Menu, Sidebar, Nút hành động).
   - Thay thế các link cứng hoặc link trống bằng Helper `route()`.
   - **Ví dụ:** Thay `<a href="#">` hoặc `<a href="/danh-sach-tin-tuc">` thành `<a href="{{ route('tintuc.index') }}">`.

3. **Kiểm tra tính nhất quán:**
   - Đảm bảo tham số truyền vào (nếu có) như ID sản phẩm/tin tức phải khớp giữa Route và Controller (Ví dụ: `route('tintuc.detail', $item->id)`).

### 🎨 Dashboard Template Rule
- Mọi giao diện quản trị (Admin) phải tuân thủ cấu trúc của folder template tại: `resources/views/admin/template`.
- **Layout chính:** Sử dụng file `template/index.html` (hoặc layout tương đương) làm bản mẫu cho `layouts/admin.blade.php`.
- **Components:** Khi tạo bảng (Table), nút (Button), hay Form, hãy copy đúng class CSS và cấu trúc HTML từ template mẫu.
- **Assets:** Đảm bảo các file CSS/JS của template được nhúng đúng vào thẻ `<head>` và trước thẻ `</body>`.

## Metadata
- type: framework-expert
- framework: Laravel 12
- language: PHP 8.3+