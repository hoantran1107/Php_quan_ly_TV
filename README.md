# Php_quan_ly_TV

Cơ sở dữ liệu: qlthuvien

tài khoản admin:
email: khaihoan@gmail.com
mk: 1234

email: huutho1408@gmail.com
mk: 1234

tài khoản user:
mssv: 61123456
mk: 1234

mssv:60200200
mk: 1234
--------------------------
Các chức năng của website quản lí thư viện:

TRANG USER
- SV chỉ mượn sách khi có thẻ thư viện, SV kiểm tra bằng cách vào trang thông tin sinh viên
- Sau khi SV điền vào phiếu đăng kí thẻ, thủ thư sẽ duyệt thẻ, sau đó thủ thư sẽ mail thông báo đến SV "Thẻ thư viện của sinh viên đã được kích hoạt, bây giờ sinh viên có thể mượn sách"
- SV click vào nút mượn sách ở bất kì cuốn sách nào, xác nhận thông tin phiếu mượn. Các cuốn sách SV đăng kí mượn sẽ có ở chi tiết phiếu mượn, SV xác nhận sách và số lượng sách (có thể xóa sách trong phiếu mượn nếu đổi ý) và xác nhận ngày mượn là có thể mượn sách.
- SV muốn trả sách cần xác nhận thời gian trả, click vào nút trả sách, một thông báo trả sách đã được gửi. Thủ thư sau khi xác nhận sách được trả, sẽ xóa các phiếu mượn liên quan.
- SV có thể xem thông tin chi tiết ở mục thông tin sinh viên, có thể sửa thông tin và đổi mật khẩu đăng nhập nếu muốn.
- SV có thể tìm kiếm sách theo tên sách, tóm tắt, tình trạng sách, tên tác giả, tên nhà xuất bản. (tìm kiếm gần đúng)

TRANG QUẢN TRỊ
- Thủ thư có thể xem, sửa, xóa danh sách thủ thư, sinh viên, danh sách phiếu mượn
- Thủ thư có thể thay đổi mật khẩu đăng nhập
- Thủ thư có nhiệm vụ xác nhận thẻ thư viện và gửi mail thông báo cho sinh viên
- Thủ thư có thể xem và sửa tình trạng các phiếu mượn sách nếu cần
- Thủ thư xác nhận sinh viên trả sách và xóa các phiếu mượn liên quan
- Thủ thư có thể xem tình trạng thư viện: tổng số lượng sách, tổng thể loại sách, tổng số lượt mượn, tổng sinh viên đăng kí
- Thủ thư có thể xuất file báo cáo cho từng mục trên ở dạng excel ở trang quản trị

Ngoài ra, hệ thống còn có một số chức năng để thủ thư/sinh viên sử dụng dễ dàng hơn.

Session, cookie: duy trì đăng nhập
 
