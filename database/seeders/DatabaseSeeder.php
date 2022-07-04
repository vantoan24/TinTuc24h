<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\CategoryNew;
use App\Models\Comment;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importRoles();
        $this->importUserGroups();
        $this->importUser();
        $this->importUserGroupRoles();
        $this->importCategories();
        $this->importNews();
        $this->importComment();
        $this->importEmail();
    }

    public function importRoles()
    {
        $groups     = ['New', 'Categorie', 'User', 'UserGroup', 'Role', 'Category_new'];
        $actions    = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }

    public function importUserGroups()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }

    public function importUser()
    {

        $user = new User();
        $user->name = 'Huỳnh Văn Toàn';
        $user->email = 'toan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/09/24';
        $user->phone = '0935779035';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/01/10';
        $user->user_group_id  = '1';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin14.png';
        $user->save();

        $user = new User();
        $user->name = 'Võ Văn Tuấn';
        $user->email = 'tuan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/04/24';
        $user->phone = '0777333274';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '3';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin13.png';
        $user->save();

        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '1';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin10.png';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Văn Quốc Việt';
        $user->email = 'viet@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2001/03/21';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/02/12';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin22.png';
        $user->save();

        $user = new User();
        $user->name = 'Trần Ngọc Linh';
        $user->email = 'Linh@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2003/11/11';
        $user->phone = '0123456788';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/02/12';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin21.png';
        $user->save();
    }

    public function importUserGroupRoles()
    {
        for ($i = 1; $i <= 42; $i++) {
            DB::table('user_group_roles')->insert([
                'user_group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }

    public function importCategories()
    {
        $category = new Categorie();
        $category->id = 1;
        $category->name = 'Thể Thao';
        $category->save();

        $category = new Categorie();
        $category->id = 2;
        $category->name = 'Xã Hội';
        $category->save();

        $category = new Categorie();
        $category->id = 3;
        $category->name = 'Chính Trị';
        $category->save();


        $category = new Categorie();
        $category->id = 4;
        $category->name = 'Giải Trí';
        $category->save();
    }

    public function importNews()
    {
        $new = new News();
        $new->title = 'XSMT 26/6, kết quả xổ số miền Trung hôm nay Chủ Nhật 26/6/2022. SXMT 26/6/2022';
        $new->description = 'XSMT 26/6. Kết quả xổ số miền Trung - XSMT 26/6/2022 cập nhật nhanh chóng, chính xác nhất từ trường quay các tỉnh và được quay lúc 16 giờ 15 phút, mở thưởng bởi 2 Công ty xổ số kiến thiết tỉnh: Khánh Hòa (XSKH) và Kon Tum (XSKT). Kết quả xổ số hôm nay bắt đầu quay từ giải tám cho đến giải nhất và cuối cùng là công bố giải đặc biệt.
        Dự đoán kết quả xổ số miền Trung - XSMT 26/6/20221 - XSMT Chủ Nhật';
        $new->image = 'https://baoquocte.vn/stores/news_dataimages/dangtuan/062022/26/19/xsmt-266-ket-qua-xo-so-mien-trung-hom-nay-chu-nhat-2662022-sxmt-2662022.png?rt=20220626191716';
        $new->content = '

        Giải tám: 29

        Đặc biệt: đầu, đuôi: 05

        Bao lô 2 số: 19 - 48 - 53

        CƠ CẤU GIẢI THƯỞNG XỔ SỐ KIẾN THIẾT MIỀN TRUNG

        Một tấm vé số truyền thống miền Trung trị giá 10.000 VND, có thể trúng nhiều giải từ nhỏ tới lớn

        - 01 Giải Đặc biệt, mỗi giải trị giá 2.000.000.000 VND

        - 10 Giải nhất, mỗi giải trị giá 30.000.000 VND

        - 10 Giải nhì, mỗi giải trị giá 15.000.000 VND

        - 20 Giải ba, mỗi giải trị giá 10.000.000 VND

        - 70 Giải tư, mỗi giải trị giá 3.000.000 VND

        - 100 Giải năm, mỗi giải trị giá 1.000.000 VND

        - 300 Giải sáu, mỗi giải trị giá 400.000 VND

        - 1.000 Giải bảy, mỗi giải trị giá 200.000 VND

        - 10.000 Giải tám, mỗi giải trị giá 100.000 VND

        - 9 Giải phụ đặc biệt, mỗi giải trị giá 50.000.000 VND. Giải phụ là những vé chỉ sai 1 chữ số ở hàng trăm hoặc hàng nghìn so với giải Đặc biệt.

        - 45 Giải khuyến khích, mỗi giải trị giá 6.000.000 VND. Giải khuyến khích dành cho các vé số trúng ở hàng trăm nghìn, chỉ sai 1 chữ số ở bất cứ hàng nào của 5 chữ số còn lại so với giải Đặc biệt.

        ĐỊA ĐIỂM VÀ THỜI GIAN QUAY SỐ MỞ THƯỞNG XỔ SỐ MIỀN TRUNG

        1. Việc mở thưởng xổ số được thực hiện tại trụ sở chính của công ty xổ số kiến thiết hoặc tại địa điểm khác nhưng phải nằm trong phạm vi địa giới hành chính của tỉnh, thành phố đó. Trường hợp mở thưởng ngoài phạm vi địa giới hành chính của tỉnh, thành phố đó hoặc liên kết khu vực để quay số mở thưởng chung thì phải được sự đồng thuận của các công ty xổ số kiến thiết và phải có ý kiến chấp thuận bằng văn bản của Bộ Tài chính.

        2. Thời gian quay số mở thưởng cụ thể do tổ chức phát hành vé xổ số quyết định nhưng không được chậm hơn 18 giờ 30 phút của ngày quay số mở thưởng.';
        $new->status = '1';
        $new->view = 83;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 2;
        $new->category_id =4;
        $new->save();

        $new = new News();
        $new->title = 'Anh T.C ở Đắc Lắc nhận thưởng hơn 41 tỷ đồng của Vietlott';
        $new->description = 'Chi nhánh Vietlott tại Khánh Hòa đã tổ chức trao giải Jackpot 1 xổ số Power 6/55 cho anh T. C, khách hàng may mắn đến từ Đắc Lắc với giải thưởng hơn 41 tỷ đồng.';
        $new->image = 'https://s.kqxs.me/images/0/1480.jpg';
        $new->content = 'Tại buổi nhận thưởng, anh C có chia sẻ tấm vé số may mắn của mình được mua tại điểm bán hàng của Vielott Khối 1, thị trấn Eak Nốp, huyện Eakar, Đăk Lăk..
        Tại đây, anh T. C chia sẻ thêm: Anh thường xuyên mua vé số của Vietlott và thường mua theo bộ số mình yêu thích, và lần này anh đã mua 2 vé bằng cách chọn những con số mình thích cho 2 kỳ liên tục ngày 10/11 và 13/11. Một trong hai chiếc vé đã may mắn trúng giải Jackpot với giá trị giải thưởng hơn 41 tỷ đồng.
        Chia sẻ niềm vui và may mắn này anh T. C đã tặng 150 triệu đồng cho các quỹ từ thiện, an sinh xã hội.
        Thời hạn lĩnh thưởng của vé trúng thưởng: là 60 (sáu mươi) ngày, kể từ ngày xác định kết quả trúng thưởng. Với những khách hàng đã mua tấm vé số của Vietlott xin hãy kiểm tra kỹ tấm vé mà mình đang sở hữu, nếu trúng giải quý khách hàng có thể liên hệ trực tiếp tới đại lý gần nhất của Vietlott để làm thủ tục nhận giải. Thời hạn nhận giải của tấm vé này là 60 ngày bắt đầy tính từ ngày quay thưởng. Xin kính chúc quý khách hàng gặp thật nhiều may mắn!.';
        $new->status = '1';
        $new->view = 74;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 2;
        $new->category_id = 2;
        $new->save();

        $new = new News();
        $new->title = 'Hơn 245.000 tỷ đồng xây dựng năm cao tốc';
        $new->description = 'Quốc hội thông qua chủ trương đầu tư xây dựng dự án Vành đai 4 Hà Nội, Vành đai 3 TP HCM và ba cao tốc phía Nam, tổng vốn đầu tư 245.000 tỷ đồng';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/16/hu-o-ng-tuye-n-va-nh-dai-4-jpg-2992-8981-1655349629.png?w=680&h=0&q=100&dpr=1&fit=crop&s=pNO0K37jugXu50MKKySovA';
        $new->content = 'Sáng 16/6, Quốc hội thông qua nghị quyết về chủ trương đầu tư dự án xây dựng đường Vành đai 4 vùng thủ đô. Tuyến đường dài 112,8 km, chia làm 7 dự án thành phần, đi qua Hà Nội, Hưng Yên, Bắc Ninh; nhu cầu sử dụng đất hơn 1.300 ha. Khi đưa vào khai thác, tuyến đường sẽ áp dụng thu phí tự động không dừng.
        Sơ bộ tổng mức đầu tư của dự án là 85.800 tỷ đồng. Nguồn ngân sách nhà nước giai đoạn 2021-2025 là 41.860 tỷ đồng, bao gồm hơn 19.380 tỷ đồng từ nguồn vốn ngân sách trung ương trong kế hoạch đầu tư công trung hạn giai đoạn 2021-2025; nguồn vốn ngân sách địa phương là hơn 22.470 tỷ đồng (Hà Nội hơn 19.470 tỷ; Hưng Yên 1.000 tỷ; Bắc Ninh 2.000 tỷ).
        Nguồn ngân sách nhà nước giai đoạn 2026-2030 hơn 14.500 tỷ đồng, bao gồm 8.790 tỷ đồng từ nguồn vốn ngân sách trung ương; nguồn vốn ngân sách địa phương là hơn 5.710 tỷ đồng. Vốn do nhà đầu tư thu xếp hơn 29.440 tỷ đồng.
        Dự án được chuẩn bị đầu tư từ năm 2022, cơ bản hoàn thành năm 2026, khai thác năm 2027. UBND TP Hà Nội là cơ quan đầu mối tổ chức thực hiện dự án. Trong hai năm kể từ khi nghị quyết được thông qua, Quốc hội cho phép người đứng đầu cơ quan có thẩm quyền xem xét, quyết định chỉ định thầu với các gói thầu tư vấn, phục vụ di dời hạ tầng kỹ thuật;
        bồi thường, hỗ trợ, tái định cư. Trong thời gian này, nhà thầu thi công không phải thực hiện thủ tục cấp phép khai thác mỏ khoáng sản làm vật liệu xây dựng thông thường.';
        $new->status = '1';
        $new->view = 85;
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Bộ Công an thông tin về "ông trùm" dùng mạng xã hội chỉ đạo chuyển trăm 115 kg ma túy';
        $new->description = 'Cục Cảnh sát điều tra tội phạm về ma tuý (C04, Bộ Công an) thông tin về đường dây mua bán cả trăm kg ma tuý xuyên quốc gia bị triệt phá với cách thức điều hành, chỉ đạo qua mạng xã hội.';
        $new->image = 'https://static-images.vnncdn.net/files/publish/2022/6/16/aa821fec0605c65b9f14-506.jpg';
        $new->content = 'Liên quan đến vụ án trên, ngày 16/6, Cục Cảnh sát điều tra tội phạm về ma túy (C04, Bộ Công an) cho biết đã bắt giữ 7 đối tượng, thu giữ 115 kg ma túy tổng hợp các loại, cùng nhiều tài liệu liên quan khác.
        Trước đó, ban chuyên án phát hiện đường dây mua bán, vận chuyển trái phép chất ma túy từ Campuchia về TP.HCM tiêu thụ.
        Điều hành đường dây là một đối tượng ở Campuchia, thông qua mạng xã hội chỉ đạo Trần Văn Hải (52 tuổi) và Nguyễn Thành Vinh (55 tuổi ở TP.HCM) phân phối cho các chân rết tiêu thụ trên địa bàn.
        Các đối tượng Hải, Vinh từng đi tù vì cướp giật tài sản. Sau khi ra tù, Hải tiếp tục thụ án 10 năm tù về tội mua bán trái phép chất ma túy, đến đầu năm 2022 đối tượng này được ra tù.
        Quá trình điều tra xác định, sau khi nhận ma túy từ Campuchia, các đối tượng vận chuyển về cất giấu tại kho ở Tôn Thất Thuyết, quận 4, TP.HCM. Tại đây, ma túy được chia nhỏ rồi bán cho Trần Trọng Khôi, Lê Minh Hảo, Trần Ngọc Diệp (vợ của Hảo), cả 2 người này đều SN 1992, trú tại TP.HCM và các chân rết khác theo sự chỉ đạo của đối tượng cầm đầu tại Campuchia.
        Ngày 4/6, tại địa phận xã Phú Xuân, huyện Nhà Bè, Cục C04 phối hợp với Công an TP.HCM, Bộ Tư lệnh Cảnh sát biển bắt quả tang Nguyễn Thành Vinh đang vận chuyển 100kg ma túy đựng trong 6 bao tải. Cùng thời điểm, tổ công tác bắt giữ Hải, thu giữ 1kg ma túy tổng hợp.
        Khám xét tại kho chứa ma túy do Hải thuê tại số 7 Tôn Thất Thuyết, thu giữ thêm 3 kg và 2.000 viên ma túy tổng hợp.
        Tiếp tục đấu tranh mở rộng vụ án, ngày 5/6, ban chuyên án bắt quả tang Lê Minh Hảo và Vũ Quốc Duy đang giao nhận 100 gói ma túy “đông trùng”. ';
        $new->status = '1';
        $new->view = 86;
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 2;
        $new->save();


        $new = new News();
        $new->title = 'Lộ diện 4 quốc gia chạy đua đăng cai VCK Asian Cup 2023';
        $new->description = 'Trước việc LĐBĐ Trung Quốc bất ngờ thông báo dừng việc đăng cai VCK Asian Cup 2023, điều này buộc AFC phải gấp rút tìm kiếm đội bóng thay thế.';
        $new->image = 'https://image.bongda24h.vn/medias/640x426twebp/original/2021/6/29/lo-thoi-diem-boc-tham-vck-asian-cup-2023.jpeg';
        $new->content = ' Lộ diện 4 quốc gia chạy đua đăng cai VCK Asian Cup 2023 Thứ Tư 15/06/2022 22:16(GMT+7)
        Trước việc LĐBĐ Trung Quốc bất ngờ thông báo dừng việc đăng cai VCK Asian Cup 2023, điều này buộc AFC phải gấp rút tìm kiếm đội bóng thay thế.
        Trước ảnh hưởng của dịch Covid-19, phía Trung Quốc vừa qua đã quyết định không đăng cai Asian Games 2002 và VCK Asian Cup 2023.
        Việc quốc gia tỷ dân không tổ chức ngày hội bóng đá lớn nhất châu lục khiến AFC phải khẩn cấp chọn ra nước chủ nhà mới thay thế Trung Quốc tổ chức Asian Cup 2023.
        Được biết vừa qua, AFC đã gửi thư mời tham gia quy trình đăng cai khẩn cấp đến tất cả các Liên đoàn thành viên, trong đó có Việt Nam (VFF), nếu Liên đoàn nào quan tâm và đủ năng lực đăng cai sẽ gửi thư đấu thầu với hạn chót ngày 30/6 tới đây.
        Ngay sau động thái này của AFC, chủ tịch LĐBĐ Nhật Bản, ông Kozo Tashima đã đánh tiếng cho biết nước này sẵn sàng nhận đăng cai và có thể tổ chức ngay đầu năm sau.
        Không chỉ có Nhật Bản, hiện tại một số quốc gia có tiềm lực kinh tế cũng sẵn sàng đăng cai giải đấu. Theo trang Asean Football, hiện tại đang có 4 quốc gia nộp đơn xin đăng cai gồm Nhật Bản, Australia, Hàn Quốc và Qatar.
        Nếu Qatar được chọn làm chủ nhà, giải đấu dự kiến sẽ được tổ chức vào tháng 1 năm 2024 do nước này không kịp tổ chức thêm một giải đấu quốc tế ngay sau VCK World Cup 2022 vào cuối năm nay.';
        $new->status = '0';
        $new->view = 67;
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 1;
        $new->save();



        $new = new News();
        $new->title = 'Vương Giả Vinh Diệu có động thái khiến Liên Quân lo “sốt vó”, Free Fire “bỗng dưng biến mất”';
        $new->description = 'Dù chưa phát hành toàn cầu nhưng sức nóng của Vương Giả Vinh Diệu đối với Liên Quân đã là rất lớn.';
        $new->image = 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/6/15/photo-1-16552938028481265707373.jpg';
        $new->content = 'Theo SensorTower, BXH trò chơi di động có doanh thu cao nhất trên toàn thế giới vào tháng 5 năm 2022 là Honor of Kings (Vương Giả Vinh Diệu) của Tencent với chi tiêu cho người chơi xấp xỉ 268 triệu đô la, tương ứng với mức tăng trưởng 1,7% từ tháng 5 năm 2021. Khoảng 95% doanh thu của Vương Giả Vinh Diệu là từ Trung Quốc, tiếp theo là 1,7% từ Đài Bắc Trung Hoa và 1,7% từ Thái Lan. Tức là ngay cả trong trường hợp gộp cả doanh thu Liên Quân vào thì cũng chỉ đóng góp một thị phần rất nhỏ. Trong tương lai, khi mà Vương Giả Vinh Diệu được phát hành toàn cầu thì chắc chắn, doanh số sẽ thực sự “đáng gờm”.
        PUBG Mobile của Tencent là trò chơi di động có doanh thu cao thứ hai trên toàn thế giới vào tháng 5 năm 2022 với tổng doanh thu là 206,3 triệu đô la. Khoảng 67% doanh thu của PUBG Mobile đến từ Trung Quốc, nơi nó đã được bản địa hóa thành Game For Peace, tiếp theo là 6,4% từ Thổ Nhĩ Kỳ. Trò chơi có doanh thu cao nhất tiếp theo là Candy Crush Saga của King, tiếp theo là Genshin Impact từ miHoYo và Coin Master từ Moon Active.
        Điều bất ngờ là, Free Fire gần như biến mất trong BXH doanh thu game mobile toàn cầu tháng này. Điều rất hiếm khi xảy ra, ít nhất là trong khoảng 1 năm trở lại đây. Trong cả hai bảng doanh thu tổng lẫn iOS, Free Fire đều không hề xuất hiện.';
        $new->status = '1';
        $new->view = 86;
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 4;
        $new->save();





        $new = new News();
        $new->title = 'Một bác sĩ rơi từ tầng 12 bệnh viện Quân y 103 xuống đất tử vong';
        $new->description = 'Tại Bệnh viện Quân y 103 vừa xảy ra một vụ tai nạn thương tâm, một bác sĩ rơi từ tầng 12 của tòa nhà xuống đất tử vong.';
        $new->image = 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/6/23/photo-1-16559592583831700187596.png';
        $new->content = 'Theo báo Dân Trí, tối ngày 22/6, trong khuôn viên bệnh viện Quân y 103 (phường Phúc La, quận Hà Đông, Hà Nội) xảy ra vụ việc một nam bác sĩ rơi từ tầng cao tòa nhà thuộc khuôn viên bệnh viện xuống đất tử vong.

        "Sự việc xảy ra vào khoảng 19h ngày 22/6, nam bác sĩ này rơi từ tầng 12 tòa nhà trong khuôn viên Bệnh viện Quân y 103 xuống đất tử vong. Hiện danh tính nạn nhân và nguyên nhân vụ việc đang được Cơ quan điều tra, Bộ Quốc phòng thụ lý làm rõ", báo Dân Trí dẫn nguồn tin.

        Một bác sĩ rơi từ tầng 12 bệnh viện Quân y 103 xuống đất tử vong - Ảnh 1.
        Hiện trường vụ việc. Ảnh: Báo Dân Trí

        Được biết, trước đó, trên mạng xã hội xôn xao một clip ghi lại hình ảnh một người đàn ông mặc áo blouse trắng nằm bất động dưới mặt đất, xung quanh có vũng máu. Bên cạnh người đàn ông có 2 nhân viên y tế đang tích cực sơ cứu. Sự việc được cho là xảy ra bên trong bệnh viện Quân y 103 (Hà Đông, Hà Nội).
        Cũng trong tối ngày 22/6, trên địa bàn quận Hai Bà Trưng, Hà Nội xảy ra vụ người đàn ông khoảng 65 tuổi rơi chung cư xuống đất tử vong.
        Theo báo Lao động, sự việc xảy ra vào khoảng 19h cùng ngày, tại chung cư 229 phố Vọng, phường Đồng Tâm. Vào thời điểm trên, chính quyền và Công an phường Đồng Tâm nhận tin báo về việc tại toà chung cư có địa chỉ tại phố Vọng, phường Đồng Tâm xảy ra vụ việc một người đàn ông rơi từ tầng cao xuống tử vong.
        Qua xác minh ban đầu, cơ quan chức năng xác định người đàn ông này tự tử. Nạn nhân 65 tuổi, là cư dân của toà chung cư. Khu chung cư này có 2 mặt, 1 mặt giáp với phố Vọng, 1 mặt giáp với đường Trần Đại Nghĩa. "Người này rơi từ trên cao xuống và mắc vào hàng rào" - vị lãnh đạo phường Đồng Tâm thông tin.';
        $new->status = '1';
        $new->view = 65;
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();



        $new = new News();
        $new->title = 'Ăn bánh trôi ngô, 1 bé tử vong, 4 người nguy kịch';
        $new->description = '4 bệnh nhân nặng được chuyển tới BV Bạch Mai tổn thương gan ồ ạt và suy gan tối cấp tính hôn mê gan, tiên lượng rất nặng, có nguy cơ cao tử vong sau khi ăn bánh trôi từ bột ngô thừa.';
        $new->image = 'https://kenh14cdn.com/203336854389633024/2022/6/22/photo-1-16558604321581122399695.jpg';
        $new->content = 'Bệnh viện Bạch Mai đang điều trị cho 4 bệnh nhân bị ngộ độc nặng sau khi ăn bánh trôi ngô, trong đó 3 bệnh nhân đang được điều trị tại Trung tâm Chống độc và 1 bệnh nhân (20 tháng tuổi) đang được điều trị tại Trung tâm Nhi khoa.

        Theo lời người nhà bệnh nhân, trong hai ngày 9 - 10/6, gia đình bà Giàng Thị L., 54 tuổi trú tại thôn Làng Tỉnh Dào B, xã Lũng Pù, huyện Mèo Vạc, tỉnh Hà Giang làm bánh trôi ngô chia cho 4 hộ gia đình trong thôn cùng ăn, không ai có biểu hiện gì.

        Ngày 16/6, bà L. lấy số bột ngâm nước để khô còn thừa từ ngày 9/6 tiếp tục làm bánh trôi ngô nấu với đường kính cho 4 thành viên trong gia đình và 3 người khác trú tại thôn Phấu Hía sang chơi cùng ăn.

        Đến sáng 17/6 (sau ăn chưa đầy 24 giờ), cháu Mua Mí P., 9 tuổi (là cháu bà L.) có triệu chứng hoa mắt, chóng mặt, đau bụng, buồn nôn sau đó tử vong tại gia đình. Đồng thời, 6 thành viên cùng ăn bánh trôi ngô cũng xuất hiện triệu chứng tương tự như Mua Mí P.

        Sau khi tiếp nhận thông tin, Trung tâm Y tế huyện Mèo Vạc  phối hợp với Ủy ban nhân nhân xã Lũng Pù xác minh, đồng thời đưa các bệnh nhân đến Bệnh viện Đa khoa (BVĐK) huyện khám và điều trị.

        Tối cùng ngày, cả 6 bệnh nhân được chuyển đến BVĐK tỉnh cấp cứu, điều trị. Sau khi đánh giá thể trạng, 4 bệnh nhân bị nặng gồm 3 người lớn và một bé 20 tháng tuổi đã được chuyển từ BVĐK tỉnh Hà Giang về Trung tâm Chống độc và Trung tâm Nhi khoa, Bệnh viện Bạch Mai.

        Ăn bánh trôi ngô, 1 bé tử vong, 4 người nguy kịch - Ảnh 1.
        1 trong số 4 bệnh nhân đang điều trị tại Bệnh viện Bạch Mai

        TS.BS. Nguyễn Trung Nguyên - Giám đốc Trung tâm Chống độc Bạch Mai cho biết: Đặc điểm chung của 4 bệnh nhân nặng được chuyển tới Bệnh viện Bạch Mai là tổn thương gan ồ ạt và suy gan tối cấp tính (tức là xuất hiện rất sớm, diễn biến rất nhanh và nặng nề), hôn mê gan, tiên lượng rất nặng, có nguy cơ cao tử vong. Trong đó có lọc máu thay huyết tương thể tích cao, lọc máu liên tục, truyền thuốc giải độc.

        Khoảng hơn 10 năm trở về trước, Hà Giang thường xuyên xảy ra các vụ ngộ độc thực phẩm với hậu quả nặng nề và tử vong do ăn bánh trôi ngô.

        Nguyên nhân ban đầu được nghi do ngộ độc hóa chất diệt chuột, tuy nhiên, sau đó nguyên nhân được phát hiện do bánh trôi ngô chứa độc tố vi nấm (độc tố từ mốc), trong đó có tìm thấy độc tố orchratoxin từ một bệnh nhân về điều trị tại Trung tâm Chống độc.

        Nguyên nhân là khi làm bánh trôi ngô bà con phải xay ngô thành bột, làm bánh, ngay lần làm bánh đầu tiên có thể không sao nếu là bột mới xay, tuy nhiên nhiều trường hợp sau khi làm bánh, bột còn thừa để lại một thời gian nên bị mốc, chứa độc tố, bà con vẫn lấy làm bánh ăn dẫn tới ngộ độc. Chính quyền địa phương và cơ quan chức năng đã tuyên truyền và quán triệt và đã tránh được nhiều trường hợp ngộ độc.


        BS. Nguyên cho biết là đã được nhiều đồng nghiệp ở các tỉnh chia sẻ một thực tế là ở nhiều địa phương các tỉnh miền núi khu vực xa xôi, do hạn chế về điều kiện giao thông và kinh tế, nguồn thực phẩm gần như duy nhất của bà con là ngô.

        Ngô sau khi trồng có thể có sẵn ít mốc nhưng đặc biệt sau khi để khô nhiều tháng thì mốc dễ dàng phát triển.

        Nếu bà con tách lấy hạt ngô lành lặn làm sạch và xay thành bột làm bánh ăn ngay thì lượng mốc và độc tố có thể còn ít và chưa bị ngộ độc. Tuy nhiên, bột đã bị nghiền để không thì mốc nhanh chóng phát triển và dễ gây ngộ độc. Có một số nơi khác có thể có gạo nhưng lại gạo cũ bị mốc cũng có thể dẫn tới các ngộ độc và bệnh tật do độc tố từ mốc gây ra.

        Để ngăn ngừa những vụ ngộ độc đáng tiếc do ăn bánh trôi ngô, BS. Nguyên khuyến cáo người dân khi sử dụng hạt ngô khô làm thực phẩm, đặc biệt là những người dân sử dụng ngô làm thực phẩm thiết yếu như ở các tỉnh miền núi, vùng sâu vùng xa cần phải tuân theo các hướng dẫn khuyến cáo của chính quyền địa phương và các cơ quan chức năng về phòng tránh ngộ độc do ăn bánh trôi ngô.

        Bà con tuyệt đối không sử dụng ngô mốc, không sử dụng bột ngô cũ để làm bánh hay thức ăn. Hạt ngô kể cả sạch sau khi đã xay/nghiền thành bột thì chế biến ngay toàn bộ thành thức ăn và ăn hết sớm.';
        $new->status = '1';
        $new->view =65;
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();


        $new = new News();
        $new->title = 'Bé gái 10 tuổi hôn mê sau khi mổ viêm ruột thừa đã tử vong';
        $new->description = 'Sau gần 2 tháng cấp cứu, điều trị tại nhiều bệnh viện do hôn mê sau khi mổ ruột thừa, bé gái 10 tuổi đã không qua khỏi.';
        $new->image = 'https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/6/23/photo-1-16559534074221164687211.jpg';
        $new->content = 'Sáng 23/6, ông Bùi Khắc Hùng, Giám đốc Trung tâm Y tế huyện Krông Pắk, tỉnh Đắk Lắk, cho biết cháu Nguyễn Hà Thảo N. (10 tuổi, ngụ huyện Krông Pắk) đã tử vong.

        Bé gái 10 tuổi hôn mê sau khi mổ viêm ruột thừa đã tử vong.
        Theo ông Hùng, cách đây 3 ngày, cháu N. được đưa từ Bệnh viện Nhi Đồng 2 - TP HCM về nhà. Trong những ngày qua, bệnh viện cũng thường xuyên thăm hỏi, hỗ trợ việc điều trị tại nhà. "Cháu đã không qua khỏi và mất vào khoảng 3 giờ sáng nay" - ông Hùng nói.

        Như Báo Người Lao Động đã phản ánh, anh Nguyễn Minh Dương (cha của cháu N.) cho biết tối 4/5, con anh kêu đau bụng nên ngày 5/5, vợ anh đã đưa cháu tới Trung tâm Y tế huyện Krông Pắk thăm khám. Lúc này, bác sĩ chẩn đoán cháu bị viêm ruột thừa và phải nhập viện để mổ. Kết thúc ca mổ, cháu bị hôn mê nên được chuyển lên Bệnh viện Đa khoa vùng Tây Nguyên.

        Đến trưa 7/5, gia đình anh Dương đã chuyển con xuống Bệnh viện Nhi Đồng 2 - TP HCM nhưng sức khỏe không tiến triển.

        Sau khi xảy ra vụ việc, anh Dương đã gửi đơn tới cơ quan chức năng đề nghị làm rõ nguyên nhân và khởi tố vụ án để điều tra.

        Nguyên nhân tử vong của cháu N. đang được cơ quan chức năng làm rõ.';
        $new->status = '0';
        $new->view =57;
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();



        $new = new News();
        $new->title = 'Nữ sinh lớp 7 bơ vơ vì mẹ mất sớm, cha đuối nước tử vong';
        $new->description = 'Đi tắm suối, người đàn ông ở tỉnh Quảng Trị không may bị đuối nước tử vong, để lại con thơ chịu cảnh mồ côi cả cha lẫn mẹ.';
        $new->image = 'https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/6/23/photo-1-16559571859011823578463.jpg';
        $new->content = 'Ngày 23/6, UBND xã Tân Hợp, huyện Hướng Hóa (tỉnh Quảng Trị) xác nhận trên địa bàn vừa xảy ra một vụ đuối nước khiến 1 người tử vong.

        Nạn nhân là anh Dương Công T. (40 tuổi, quê ở huyện Lệ Thủy, tỉnh Quảng Bình, ngụ tại thôn Quyết Tâm, xã Tân Hợp).

        Nữ sinh lớp 7 bơ vơ vì mẹ mất sớm, cha đuối nước tử vong - Ảnh 1.
        Trước đó, vào chiều 22/6, anh T. cùng nhóm bạn đến suối Tà Đủ (xã Tân Hợp) để tắm. Quá trình tắm, anh T. tự tách mình ra khỏi nhóm. Đến khoảng 17 giờ cùng ngày, mọi người không thấy anh T. nên đi tìm và bất ngờ phát hiện thi thể anh T. nổi lên dưới suối Tà Đủ.

        Được biết, vợ anh T. đã mất do bệnh tật, anh có một con gái tên là Dương Nguyễn Diệu Châu, học sinh lớp 7, Trường Tiểu học và Trung học cơ sở Tân Hợp.

        Trong đêm 22/6, thi thể của anh T. đã được đưa về quê để người thân lo hậu sự.';
        $new->status = '1';
        $new->view = 67;
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();

        $new = new News();
        $new->title = 'Man United sẽ ra sao nếu Ronaldo ra đi?';
        $new->description = 'Báo chí Anh vừa tiết lộ chuyện Cristiano Ronaldo đang không hài lòng với sự chậm chân của Man United trên TTCN từ đầu mùa Hè năm nay. Và thậm chí, Ronaldo còn tính tới khả năng chia tay Quỷ đỏ nếu tình hình không được cải thiện. Câu hỏi đặt ra là MU sẽ ra sao nếu mất nốt CR7?';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/25/26/ronaldo.jpg';
        $new->content = 'HLV Erik ten Hag đã tới M.U từ trước khi mùa giải 2021/22 khép lại. Việc Quỷ đỏ bổ nhiệm Ten Hag từ rất sớm được cho là để họ có thêm thời gian để xây dựng đội bóng cũng như mang về Old Trafford các bản hợp đồng theo đúng ý đồ chiến lược gia người Hà Lan. Tuy nhiên, bất chấp mùa giải cũ đã khép lại được 1 tháng, thì tới thời điểm này M.U vẫn chưa mua được một cầu thủ nào mới.

        Họ từng nhắm tới Darwin Nunez. Nhưng ai cũng biết Nunez sau đó đã cập bến Liverpool. M.U được cho là đã theo đuổi De Jong suốt từ đầu mùa Hè này. Nhưng vụ chuyển nhượng của ngôi sao Hà Lan vẫn chưa có diễn biến mới, bất chấp M.U có vũ khí Ten Hag, người từng là thầy cũ của De Jong tại Ajax. Cả cầu thủ chạy cánh Antony của Ajax cũng được coi là mục tiêu chuyển nhượng hàng đầu của Quỷ đỏ. Nhưng cũng như vụ De Jong, thương vụ này cũng chưa có bước tiến nào đáng kể.

        Trong khi đó, đã có ít nhất 2 cầu thủ từ chối M.U. Người đầu tiên là hậu vệ Jurrien Timber, người đã lập tức khước từ Quỷ đỏ sau khi nhận được sự cảnh báo của Van Gaal. Hay cả cầu thủ trẻ Malcolm Ebiowei cũng nói không với M.U vì thích tới… Crystal Palace hơn. Xin nhắc lại, Timber và Malcolm đều là 2 cái tên còn khá vô danh, nhưng cả 2 đều từ chối Quỷ đỏ. Điều này cho thấy sức hút của M.U trên TTCN đã tụt giảm thê thảm như thế nào. Bây giờ, họ không còn ở vị thế “cửa trên” khi đi đàm phán mua người như xưa nữa.

        Tất cả đang khiến M.U thất thế trong cuộc đua tăng cường lực lượng cho mùa giải mới so với các đại gia khác ở Premier League. Man City đã có Erling Haaland. Liverpool mua được Nunez. Tottenham có Ivan Perisic, Yves Bissouma. Arsenal cũng bổ sung được Fabio Vieira, Marquinhos. Chỉ riêng Quỷ đỏ vẫn là con số 0.

        Ronaldo rõ ràng không hài lòng về điều này. Theo tiết lộ của tờ Record, CR7 đã gửi thông điệp “nâng cấp đội bóng hoặc tôi sẽ ra đi” tới BLĐ M.U. Ronaldo là người luôn khao khát giành những danh hiệu. Anh không tin rằng với lực lượng như hiện tại, M.U có khả năng cạnh tranh chức vô địch ở mùa 2022/23. Ronaldo chắc chắn không muốn gắn bó lâu dài với một CLB như thế nên tối hậu thư đã được anh chuyển tới Old Trafford. Hợp đồng của Ronaldo với M.U vẫn còn thời hạn 1 năm nữa. Nhưng siêu sao Bồ Đào Nha sẵn sàng ra đi sớm hơn dự kiến nếu tình hình chuyển nhượng ở Quỷ đỏ không được cải thiện.
        M.U không có Ronaldo thì sao?
        Tới đây, câu hỏi đặt ra là nếu M.U mất nốt CR7 thì sẽ ra sao? Mùa giải trước, đã có nhiều ý kiến cho rằng Ronaldo làm ảnh hưởng tới lối chơi chung của Quỷ đỏ. Sự xuất hiện của CR7 khiến M.U không thể đá pressing thời Ralf Rangnick, cũng như khó chơi phản công thời Ole Solsa. Tuy nhiên, dù có ý kiến trái chiều như nào thì vẫn không ai phủ nhận được Ronaldo chính là ngôi sao quan trọng nhất trên hàng công Quỷ đỏ mùa trước. Anh đã ghi 24 bàn trên mọi đấu trường và là Vua phá lưới M.U mùa 2021/22. Số bàn thắng của anh còn nhiều hơn gấp đôi người xếp sau là Bruno Fernandes (10). Thế nên điều đầu tiên mà M.U mất nếu Ronaldo ra đi là họ sẽ mất một cầu thủ sẽ đảm bảo mang về cho CLB ít nhất 20 pha lập công.

        Mọi chuyện sẽ càng đáng ngại hơn nếu nhìn vào những tiền đạo còn lại mà Quỷ đỏ đang có nếu Ronaldo ra đi. Marcus Rashford đã sa sút thảm hại từ sau EURO 2020. Mason Greenwood thì chưa biết bao giờ mới được trở lại. Anthony Martial sẽ bị đem bán còn Edinson Cavani sẽ ra đi. Vậy ai sẽ ghi bàn cho M.U nếu Ronaldo rời Old Trafford?

        Ten Hag có thể sẽ đem tới những tiền đạo mới. Nhưng kể cả vậy thì vai trò đàn anh, người dẫn dắt của Ronaldo vẫn rất quan trọng trong giai đoạn M.U chuyển giao thế hệ trên hàng công. Zlatan Ibrahimovic cũng từng làm rất tốt vai trò này trong mùa giải 2016/17, khi anh được Jose Mourinho đưa về Old Trafford và đã ghi tới 28 bàn/46 trận mùa đó.

        Tóm lại, ở giai đoạn này, khi mọi thứ dưới thời Ten Hag là chưa rõ ràng, thì mất Ronaldo không phải điều tốt đẹp cho M.U. Bởi sự hồi sinh của Quỷ đỏ với Ten Hag vẫn là thứ gì đó còn mơ hồ. Nhưng hàng chục bàn thắng của Ronaldo cho Quỷ đỏ là con số nhìn thấy được.

        Bayern bất ngờ nhắm Ronaldo
        Báo chí Anh bất ngờ tiết lộ thông tin Bayern đã đưa Ronaldo vào tầm ngắm để thay thế Lewandowski. Tiền đạo người Ba Lan đang muốn chuyển sang Barcelona, nhưng Hùm xám lại ngăn chưa cho thương vụ này xảy ra. Nếu tìm ra người thay thế xứng tầm kiểu như Ronaldo, rất có thể Bayern mới đồng ý để Lewandowski rời đi.

        21. Tổng số bàn thắng của 5 tiền đạo M.U mùa trước là Rashford, Greenwood, Cavani, Sancho và Elanga là 21 bàn, tức là còn chưa bằng một mình số bàn của Ronaldo (24 bàn).';
        $new->status = '1';
        $new->view = 43;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();




        $new = new News();
        $new->title = 'Ai xứng đáng thay Maguire làm đội trưởng của Man United?';
        $new->description = 'HLV Erik ten Hag đang phải làm một công việc đẩy khổ ải ở Man United. Ngoài việc xây dựng một đội hình đủ sức cạnh tranh các danh hiệu trong bối cảnh không cầu thủ nào muốn tới Old Trafford, ông còn một nhiệm vụ quan trọng khác. Đó là đi tìm thủ lĩnh mới cho Quỷ đỏ.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/25/26/Maguire-1.jpg';
        $new->content = '“Làm đội trưởng của Man United không phải là công việc dành cho những kẻ yếu đuối. Bạn phải biết cách dẫn dắt và khơi dậy tinh thần chiến đấu của các đồng đội”. Cựu thủ quân của M.U, Roy Keane từng nói vậy trong một cuộc trả lời phỏng vấn năm 2003. Và rõ ràng, cựu danh thủ người CH Ireland hoàn toàn có tư cách để đưa ra tuyên bố ấy.

        Vì sau 12 năm gắn bó với 17 danh hiệu lớn nhỏ cùng Quỷ đỏ, Keane đã trở thành một tượng đài của sân Old Trafford. Anh thậm chí từng được bầu là “Thủ quân vĩ đại nhất lịch sử Premier League” trong cuộc bầu chọn hồi tháng Ba vừa qua của trang SPORTbible, vượt qua những tên tuổi lừng lẫy khác như Steven Gerrard, John Terry hay Patrick Vieira. Mà Keane lại dường như có ác cảm đặc biệt với Harry Maguire.

        Bình luận trên sóng của kênh truyền hình Sky Sports hồi tháng Tư, cựu tiền vệ này thậm chí từng nói thẳng là Maguire “không đủ giỏi” để trở thành thủ lĩnh của M.U. Keane cho rằng “muốn trở thành một đội trưởng hợp lệ, bạn phải là cầu thủ hàng đầu ở vị trí của mình”. Nhưng nhìn lại mùa giải 2021/22, Maguire đã không chứng tỏ được gì cả trong khả năng phòng ngự lẫn năng lực lãnh đạo.

        Vì thế, nếu muốn xây dựng một đội bóng mới, HLV Ten Hag sẽ cần một thủ lĩnh mới. Tuy nhiên, ai là người xứng đáng trở thành “Quỷ đầu đàn” tại Old Trafford mùa giải tới? Nhìn vào những cái tên hiện tại, đó có lẽ sẽ chỉ là một trong ba cái tên Cristiano Ronaldo, David de Gea hoặc Bruno Fernandes.
        Lựa chọn lý tưởng nhất chính là Ronaldo, người vốn không xa lạ gì với vai trò đội trưởng sau hơn một thập kỷ đeo băng thủ quân của đội tuyển Bồ Đào Nha. CR7 cũng luôn đòi hỏi rất cao ở bản thân và cả các đồng đội, và vẫn cho thấy tầm ảnh hưởng rất lớn với đội bóng. Vấn đề duy nhất chỉ là anh đã 37 tuổi, nên không thể trở thành một giải pháp dài hạn.

        Qua đó, có thể thấy thông tin cho rằng Minh Hằng "cướp chồng" chỉ là sự thêu dệt của cư dân mạng đối với nữ ca sĩ';
        $new->status = '1';
        $new->view = 87;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();



        $new = new News();
        $new->title = 'Ten Hag "đẩy" Rangnick khỏi MU sau khi từ chối gặp mặt';
        $new->description = 'Theo ESPN, tân HLV Erik ten Hag là người đóng một vai trò quan trọng trong việc Ralf Rangnick đột ngột kết thúc giao kèo với Man United để chuyên tâm dẫn dắt ĐT Áo.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/24/8/ten-hag-MU.jpg';
        $new->content = 'Ralf Rangnick lên nắm quyền tại MU vào đầu tháng 12/2021 nhưng để lại nỗi thất vọng ghê gớm. Ông lập kỷ lục là HLV có tỷ lệ chiến thắng thấp nhất lịch sử đội bóng trong kỷ nguyên Premier League. Kể từ khi thay thế Ole Gunnar Solskjaer, HLV người Đức chỉ giành được 37,9% chiến thắng.

        Thành tích của Quỷ đỏ vô cùng tệ hại khi về đích thứ 6 chung cuộc ở Ngoại hạng Anh. Đội chủ sân Old Trafford thu về 58 điểm, là mùa giải họ giành số điểm thấp nhất kỷ nguyên Premier League. Ở các đấu trường khác, MU cũng đều thất bại cay đắng. Cuối tháng 5 vừa qua, Rangnick đã thông báo rằng ông sẽ không tiếp tục ở lại Man United với tư cách là cố vấn do những yêu cầu của vai trò HLV mới đảm nhiệm tại ĐT Áo.

        Nhưng thông tin mà ESPN mới đưa có vẻ không phải như thế. Cụ thể, Rangnick đã đồng ý rời Man United sớm, một phần vì Ten Hag không muốn miễn cưỡng làm việc với chiến thuật gia người Đức trong vai trò cố vấn. Có thông tn cho rằng, Man United không muốn giữ Rangnick sau khi tham khảo ý kiến của tân HLV Ten Hag.

        Chưa hết, Rangnick không hề hài lòng khi không được trao quyền trực tiếp chuyển giao công việc cho tân HLV của Quỷ đỏ. Rangnick mong đợi gặp mặt Ten Hag để có một cuộc nói chuyện chi tiết nhưng thay vào đó, cựu HLV Ajax quyết định chỉ trao đổi qua điện thoại.

        Tiếp đó, ESPN đưa tin, BLĐ đội chủ sân Old Trafford có phần không thoải mái trước một số bình luận công khai của Rangnick trong các cuộc họp báo, đặc biệt là khi vị HLV này tuyên bố CLB cần tới 10 tân binh trong mùa Hè 2022. Các nguồn tin cho biết thêm rằng Man United đã yêu cầu Rangnick ký một thỏa thuận không tiết lộ thông tin mật của CLB nhưng rồi ông vẫn "bon mồm".

        Bây giờ, nhiệm vụ tái thiết Man United sẽ do Ten Hag toàn quyền phụ trách. Cuối tháng này, MU sẽ hội quân chuẩn bị cho mùa giải mới. Trận ra mắt của Ten Hag trên cương vị mới tới vào ngày 12/7 khi MU đá giao hữu với Liverpool ở Thái Lan.';
        $new->status = '1';
        $new->view = 78;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();

        $new = new News();
        $new->title = 'AFF Cup đổi nhà tài trợ';
        $new->description = 'Kể từ năm 2022, AFF Cup sẽ gắn bó với nhà tài trợ mới. Giải đấu sẽ mang tên gọi: AFF Mitsubishi Electric Cup.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/05/23/56/aff-0.jpg';
        $new->content = 'Trưa 23/5, tại Hà Nội, LĐBĐ Đông Nam Á đã công bố nhà tài trợ mới cho giải vô địch bóng đá Đông Nam Á (AFF Cup). Đến dự buổi lễ công bố có các ông: Khiev Sameth, Chủ tịch LĐBĐ Đông Nam Á (AFF); Kunihiko Seki, Trưởng đại diện khu vực châu Á Thái Bình Dương của Tập đoàn Mitsubishi; Malcolm Thorpe - Giám đốc điều hành công ty SPORT FIVE khu vực Đông Nam Á, đối tác độc quyền về thương mại và truyền thông của AFF; Trần Quốc Tuấn - Quyền Chủ tịch LĐBĐ Việt Nam.

        Theo đó, kể từ năm 2022, AFF Cup sẽ gắn bó với một nhà tài trợ mới, là Mitsubishi Electric. Giải đấu sẽ có tên chính thức là AFF Mitsubishi Electric Cup. Ông Kunihiko Seki, Trưởng đại diện khu vực châu Á Thái Bình Dương của Tập đoàn Mitsubishi vinh dự nói: “Khi thế giới bắt đầu mở cửa trở lại sau thời gian dịch bệnh, chúng tôi rất vui mừng được trở thành nhà tài trợ chính của giải vô địch Đông Nam Á. Chúng tôi mong muốn cùng nhau xây dựng một tương lai tốt đẹp hơn với AFF. Mitsubishi Electric hy vọng có thể mang lại sự phấn khích và niềm vui cho nhiều người hâm mộ thông qua mối quan hệ này”.
        Chủ tịch Khiev Sameth của AFF khẳng định: “Mối quan hệ hợp tác này sẽ báo trước một kỷ nguyên mới cho bóng đá Đông Nam Á. Tôi rất lạc quan rằng chúng ta có thể đẩy giải đấu lên một tầm cao mới, cùng nhau nâng tầm bóng đá trong khu vực. Thực ra, Mitsubishi Electric đã tài trợ cho AFF Cup trong nhiều kỳ gần đây. Nhưng họ mới chỉ dừng lại ở nhà tài trợ vàng chứ chưa gắn tên với giải đấu”.

        Theo kế hoạch, giải đấu sẽ bắt đầu vào tháng 12, ngay sau khi World Cup kết thúc.';
        $new->status = '1';
        $new->view = 57;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();





        $new = new News();
        $new->title = 'Quang Hải được báo Thái Lan bầu vào đội hình tiêu biểu AFF Cup 2020';
        $new->description = 'Quang Hải và Witan Sulaeman của Indonesia được tờ Goal của Thái Lan bình chọn vào đội hình 11 cầu thủ tại AFF Cup 2020.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/01/03/38/hai.jpeg';
        $new->content = 'Tiền vệ Nguyễn Quang Hải là cầu thủ Việt Nam duy nhất góp mặt trong đội hình tiêu biểu AFF Cup 2020 do Goal phiên bản Thái Lan bình chọn. ĐT Thái Lan chiếm đến 9 vị trí trong đội hình xuất sắc trong đội hình 4-2-3-1, gồm thủ môn Chatchai Budprom, bộ tứ vệ Narubadin Weerawatnodom, Kritsada Kaman, Manuel Bihr, Theerathon Bunmathan, các tiền vệ Phitiwat Sukjitthammakul, Sarach Yooyen, Chanathip Songkrasin và chân sút Teerasil Dangda. 2 cầu thủ còn lại là Quang Hải và Witan Sulaeman (Indonesia).
        "Với Quang Hải, AFF Cup 2020 là giải đấu đáng thất vọng. Anh vẫn là niềm hy vọng lớn của tuyển Việt Nam và duy trì phong độ đáng sợ. Ngay cả trong trận thua 0-2 trước Thái Lan ở bán kết lượt đi, Quang Hải vẫn cho thấy bản thân là cầu thủ nguy hiểm, khiến đối thủ phải gặp áp lực mỗi khi bóng rời đi từ cái chân trái của anh", tờ Goal phiên bản Thái Lan nhận xét về Quang Hải.

        Cũng nói thêm, tại AFF Cup 2020, Quang Hải thi đấu 6 trận cho tuyển Việt Nam. Anh để lại 2 bàn thắng, 2 kiến tạo và 13 đường chuyền tạo cơ hội. ';
        $new->status = '1';
        $new->view = 92;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();



        $new = new News();
        $new->title = 'Bóng đá Việt Nam và tấm gương Thái Lan: Học hỏi để phát triển hơn nữa';
        $new->description = 'Nhìn từ chức vô địch AFF Cup của đội tuyển Thái Lan, Việt Nam không chỉ thấy được những bài học về chuyên môn mà còn là sự phát triển đường dài mang tầm vĩ mô mà bóng đá đất nước Chùa vàng đã nghiêm túc thực hiện suốt 15 năm qua.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/01/04/25/VIET---THAI.jpg';
        $new->content = 'Ngay sau chức vô địch AFF Cup 2020, Alexandre Mano Polking, đương kim HLV trưởng đội tuyển Thái Lan đồng thời cũng là cựu thuyền trưởng CLB TP.HCM có nhận xét rằng V.League cần phải học hỏi nhiều ở Thai League. Ông đưa ra 2 tiêu chí cho thấy sự khác biệt giữa giải đấu số 1 của Thái Lan và giải đấu số 1 đến từ Việt Nam. Đó là hàng loạt SVĐ tốt và những cầu thủ giỏi. Cũng từ 2 yếu tố cốt lõi này, chất lượng của các CLB của Thái Lan ngày càng được nâng tầm trên bình diện châu lục. Nhờ đó, đẳng cấp của Thai League cũng được đẩy mạnh trong khoảng 5 năm trở lại đây. Theo xếp hạng của AFC, Thai League đang xếp thứ 9 tại châu Á, hơn Việt Nam 5 bậc trên BXH.
        Đấy là chất lượng nội hàm của giải đấu. Còn về mặt hình ảnh và giá trị truyền thông, việc có những CLB mạnh, các nội binh lẫn ngoại binh giỏi cộng thêm sân vận động được chăm sóc kỹ càng, chuyên nghiệp giúp Thai League thu hút sự quan tâm rất lớn của các đơn vị truyền hình và truyền thông. Theo Siam Sports, Thai League sẽ thu về tổng số tiền bản quyền truyền hình là 800 tỷ đồng/mùa. Nhờ vậy, mỗi CLB ở giải VĐQG Thái Lan có thể nhận dao động trong một mùa giải là từ 50-60 tỷ đồng. Chỉ riêng con số này cũng bằng nguyên ngân sách hoạt động trong năm của một CLB lớn tại V.League.
        Song song với đó, các hạng đấu của Thái Lan cũng được tổ chức theo mô hình kim tự tháp rất quy củ. Trong đó, đỉnh của kim tự tháp là Thai League 1 với 16 CLB tham gia. Thấp hơn ở Thai League 2, 18 CLB góp mặt. Xếp phía dưới là giải bán chuyên Thai League 3 tập hợp tới 72 CLB được chia làm 6 vùng miền gồm phía Bắc (11 đội), Đông Bắc (11 đội), phía Đông (12 đội), phía Tây (12 đội), nội đô Bangkok (14 đội) và phía Nam (12 đội). Đó là điều mà bóng đá Việt Nam với hệ thống các giải chuyên nghiệp và bán chuyên nên học hỏi để có sự cạnh tranh cao hơn, chất lượng tốt hơn nữa.
        Thành công của ĐTQG Thái Lan được xây dựng dựa trên hai nhóm cầu thủ. Thứ nhất là đa phần gương mặt chơi bóng ở Thai League - một giải chất lượng tương đối cao ở châu lục và thuộc diện số 1 Đông Nam Á. Thứ hai là 2 ngôi sao thành danh ở Nhật Bản gồm Chanathip Songkrasin và Theerathon Bunmathan. Những gì mà hai cầu thủ này thể hiện ở AFF Cup 2020 quả thực khiến người hâm mộ chờ đợi vào những cái tên như Hoàng Đức, Quang Hải có thể xuất ngoại để phát triển năng lực trong tương lai gần.
        HLV Polking của Thái Lan gợi ý: “Tôi mong Quang Hải, cầu thủ đại diện của Việt Nam có thể làm được như thế. Họ cần phải tới Nhật Bản, Hàn Quốc và các giải khác. Thậm chí là cả châu Âu. Các cầu thủ giỏi không nên bó buộc mình ở trong nước nữa”. Tiếp lời người thầy của mình, Chanathip – biểu tượng xuất ngoại thành công hy vọng: “Những cầu thủ giỏi nhất ở các đội tuyển trong khu vực như Quang Hải hay Hoàng Đức của Việt Nam nên cân nhắc rời khỏi vùng an toàn để tìm đến các nền bóng đá cao hơn nhằm tiếp tục nâng cao khả năng của mình”.';
        $new->status = '1';
        $new->view = 96;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();








        $new = new News();
        $new->title = 'Thường trực Ban Bí thư: Cán bộ phải tránh xa cám dỗ';
        $new->description = 'Cán bộ cần giữ mình cho đúng, không tròn vo, né tránh, đùn đẩy trách nhiệm, phải tránh xa thói hư tật xấu, cám dỗ, theo Thường trực Ban Bí thư Võ Văn Thưởng.';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/25/z3519019500478-edaa6bc612a1-3392-1656173350.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=4XmoI0rrEho5VfU7531_3w';
        $new->content = 'Sáng 25/6, Ban Tổ chức Trung ương gặp mặt các ủy viên dự khuyết Trung ương Đảng khóa XIII. Tại hội nghị, có ý kiến bày tỏ băn khoăn khi một số cán bộ thời gian gần đây vi phạm quy định của Đảng, pháp luật của Nhà nước và đặt câu hỏi, năng động, sáng tạo có mâu thuẫn với chặt chẽ không? Dám nghĩ, dám làm có dễ dẫn tới sai phạm không?

        Thường trực Ban Bí thư Võ Văn Thưởng cho biết, những sai phạm của cán bộ thời gian qua, nhìn dưới góc độ tích cực là bài học quý với mỗi cán bộ để kỹ lưỡng, chỉn chu hơn trong công tác, chứ không phải vì thế mà né tránh, không làm. Cán bộ hiểu đúng việc "giữ mình" thì sẽ thành người chặt chẽ, kỹ lưỡng hơn.

        Thường trực Ban Bí thư mong muốn cán bộ trẻ khi được Đảng giao nhiệm vụ thì hăng hái đảm nhận, không ngừng tiến bộ. "Tiến bộ không phải đo lường bằng chức vụ mà về bản lĩnh, nhận thức, kiến thức, bằng sự vững vàng trong công việc", ông nói.
        Ông Võ Văn Thưởng từng là một trong 25 ủy viên Trung ương dự khuyết khóa X. Khi đó, lần đầu ông được dự hội nghị Trung ương lần thứ nhất tại Đại hội X, tự cảm thấy trách nhiệm nặng nề, lớn lao; tự nhắc nhở bản thân nỗ lực, xứng đáng với trọng trách được giao.

        "Trung ương luôn mong muốn các ủy viên dự khuyết tiến bộ và đó cũng là trách nhiệm của Bộ Chính trị, Ban Bí thư trong công tác đào tạo, bồi dưỡng cán bộ cho Đảng. Đây là công việc có ý nghĩa quan trọng đối với vận mệnh của Đảng, chế độ, đất nước", ông Thưởng chia sẻ.

        Mỗi ủy viên Trung ương dự khuyết cần không ngừng nỗ lực, rèn luyện để tiến bộ về mọi mặt, trong công việc luôn trăn trở tìm cách giải quyết, tháo gỡ khó khăn, nỗ lực tự học, tự rèn luyện. Đặc biệt, cán bộ trẻ phải thẳng thắn, rèn luyện viết, nói, nghiên cứu cương lĩnh, nghị quyết, tìm hiểu lịch sử đảng, dân tộc; ứng xử có trước có sau, tình nghĩa, giữ mối quan hệ mật thiết với nhân dân.

        Kết luận hội nghị, Trưởng ban Tổ chức Trung ương Trương Thị Mai đánh giá, các ủy viên Trung ương dự khuyết là lớp cán bộ trẻ tiệm cận với công việc cao của Đảng. Ban Tổ chức Trung ương có trách nhiệm hỗ trợ ủy viên dự khuyết phấn đấu, rèn luyện, trưởng thành; tham mưu cho Đảng đội ngũ kế cận xứng đáng.

        Vấn đề ủy viên Trung ương dự khuyết được Đảng quan tâm ngay từ Đại hội II. Nhiều người qua phấn đấu đã giữ những chức vụ lãnh đạo chủ chốt, như các ông Đỗ Mười, Nông Đức Mạnh, Trần Đức Lương, Võ Văn Kiệt, Nguyễn Văn An, Nguyễn Tấn Dũng... Đây là tấm gương để cán bộ trẻ nỗ lực, phấn đấu.
        "Điều quan trọng vẫn nằm ở nhân cách, phẩm chất, đạo đức. Càng trẻ càng phải nghiêm khắc với bản thân. Đảng luôn mong muốn có lớp trẻ kế cận đủ năng lực, phẩm chất, uy tín", bà Mai nói, mong muốn cán bộ dự khuyết hôm nay trong tương lai sẽ vững vàng thành ủy viên chính thức và giữ vị trí quan trọng và "đi hết trọn vẹn cuộc đời với Đảng, không thể đi giữa chừng rồi bật ra ngoài".

        Đại hội Đảng lần thứ XIII đã bầu 20 ủy viên Trung ương dự khuyết; trong đó 19 người tham gia lần đầu; một người tái cử; độ tuổi bình quân đầu nhiệm kỳ là 43,7.';
        $new->status = '1';
        $new->view = 67;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Bộ trưởng Nội vụ: Khó ủy quyền hoàn toàn cho TP Thủ Đức';
        $new->description = 'TP HCMTheo Bộ trưởng Nội vụ Phạm Thị Thanh Trà, khó phân cấp, ủy quyền hoàn toàn cho TP Thủ Đức vì địa phương vẫn cần liên thông, liên kết với các cấp khác.';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/23/z3513979030442-7c6206d20d8a1ad-8994-7199-1655971154.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=YREIjRGxNNZB7aBG6pw7_A';
        $new->content = 'TP Thủ Đức được lập đầu năm 2020, trên cơ sở sáp nhập quận 2, 9 và Thủ Đức, rộng khoảng 211 km2. Nơi đây được kỳ vọng là hạt nhân dẫn đầu, đóng góp 1/3 tổng sản phẩm trên địa bàn (GRDP) của TP HCM, tương đương 7% tổng sản phẩm quốc nội (GDP) cả nước.

        Tuy nhiên, Chủ tịch TP Thủ Đức Hoàng Tùng cho biết sau một năm rưỡi thành lập, mô hình "thành phố trong thành phố" đầu tiên cả nước gặp nhiều khó khăn. Hiện bộ máy hành chính của địa phương chỉ tương đương cấp huyện, dù khối lượng công việc rất lớn sau khi nhập quận. 6 tháng đầu năm nay, Thủ Đức tiếp nhận 17.100 hồ sơ thủ tục hành chính; 44.000 hồ sơ nhà đất, khả năng cuối năm hơn 100.000 hồ sơ.
        Theo ông Tùng, dù dân số 1,2 triệu người, công việc ngày càng nhiều lên, song số biên chế sau thành lập của TP Thủ Đức phải giảm 30% so với ba quận trước kia là "chắc chắn không làm được". Từ thực tế đó, lãnh đạo TP Thủ Đức đề nghị Bộ Nội vụ cho địa phương giữ nguyên số biên chế như trước khi sáp nhập và được ký hợp đồng công chức để giảm sức ép cho phường đông dân.

        Bộ trưởng Nội vụ Phạm Thị Thanh Trà cho biết trong các chính sách TP HCM đề xuất cho Thủ Đức, vấn đề biên chế rất khó phân cấp hoàn toàn vì việc này Trung ương quản lý. Do vậy Bộ Nội vụ định hướng đề xuất Chính phủ giao khung biên chế chung cho TP HCM. Trên số lượng được giao, thành phố tổ chức bộ máy cho từng địa phương, trong đó có Thủ Đức.

        Lãnh đạo Bộ Nội vụ cũng cho rằng nghị quyết thay thế Nghị quyết 54 "không thể đủ hết" cho TP Thủ Đức và việc nêu đề xuất quá cụ thể khó thuyết phục Quốc hội. Thay vào đó, bà đề nghị trong nghị quyết mới có quy định về nguyên tắc giao TP HCM phân cấp, uỷ quyền cho TP Thủ Đức sẽ hiệu quả hơn.

        Trước đó, Phó chủ tịch UBND TP HCM Võ Văn Hoan nói trong nghị quyết mới đang xây dựng nhằm thay thế Nghị quyết 54 về cơ chế đặc thù cho TP HCM, thành phố dành một chương riêng về chính sách cho TP Thủ Đức, tập trung vào các kiến nghị: tổ chức, bộ máy phù hợp; phân cấp, ủy quyền mạnh hơn; có một số chức năng, nhiệm vụ của sở ngành để hoạt động "đúng nghĩa như thành phố".';
        $new->status = '1';
        $new->view = 64;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Đề nghị kỷ luật ông Nguyễn Thành Phong';
        $new->description = 'Ủy ban Kiểm tra Trung ương đề nghị Bộ Chính trị xem xét kỷ luật ông Nguyễn Thành Phong, Ủy viên Trung ương Đảng, Phó trưởng ban Kinh tế Trung ương, nguyên Chủ tịch TP HCM.';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/22/dai-hoi-dang709-1931-1655898046.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=R0OOEBhFLl0uS9LeAj2Qkg';
        $new->content = 'Theo thông cáo phát chiều 22/6, tại kỳ họp ngày 20-22/6, Ủy ban Kiểm tra Trung ương đã đề nghị Bộ Chính trị xem xét, thi hành kỷ luật Ban cán sự đảng UBND TP HCM nhiệm kỳ 2016-2021 và ông Nguyễn Thành Phong, Ủy viên Trung ương Đảng, Phó trưởng ban Kinh tế Trung ương, nguyên Phó bí thư Thành ủy, nguyên Bí thư Ban cán sự đảng, nguyên Chủ tịch UBND TP HCM.

        Cơ quan kiểm tra Trung ương quyết định cảnh cáo Ban Thường vụ Đảng ủy Sở Xây dựng và Ban Thường vụ Đảng ủy Văn phòng UBND TP HCM nhiệm kỳ 2015-2020; khiển trách ông Võ Văn Hoan, Ủy viên Ban cán sự đảng, Phó chủ tịch UBND thành phố, nguyên Bí thư Đảng ủy, nguyên Chánh Văn phòng UBND thành phố.

        Quyết định được đưa ra sau khi Ủy ban Kiểm tra Trung ương xem xét kết quả kiểm tra khi có dấu hiệu vi phạm đối với Ban cán sự đảng UBND TP HCM nhiệm kỳ 2016-2021.
        Cơ quan kiểm tra Trung ương nhận thấy Ban cán sự đảng UBND TP HCM đã vi phạm nguyên tắc tập trung dân chủ, quy chế làm việc; thiếu trách nhiệm, buông lỏng lãnh đạo, chỉ đạo. Hậu quả là UBND thành phố và nhiều tổ chức, cá nhân vi phạm quy định của Đảng, pháp luật của Nhà nước trong quản lý tài chính, tài sản nhà nước; xảy ra nhiều vụ án, vụ việc trên địa bàn; nhiều tổ chức đảng, đảng viên bị xử lý kỷ luật; nhiều cán bộ, đảng viên trong đó có cả lãnh đạo chủ chốt của UBND thành phố và các sở, ngành... bị xử lý hình sự.

        "Những vi phạm nêu trên đã gây hậu quả nghiêm trọng, khó khắc phục, làm thất thoát rất lớn tài sản, ngân sách của Nhà nước, gây bức xúc trong xã hội, ảnh hưởng xấu đến uy tín của cấp ủy và chính quyền địa phương", thông cáo nêu.

        Cơ quan Kiểm tra Trung ương yêu cầu Ban Thường vụ Thành ủy TP HCM chỉ đạo, xem xét, xử lý kỷ luật các tổ chức, cá nhân khác có liên quan đến các vi phạm nêu trên.

        Ông Phong 59 tuổi, quê Bến Tre, trình độ tiến sĩ kinh tế, là Ủy viên Trung ương Đảng khóa XI, XII, XIII. Ông từng kinh qua các chức vụ Bí thư Trung ương Đoàn phụ trách phía Nam; Bí thư Thường trực Trung ương Đoàn; Bí thư Quận ủy quận 2, TP HCM; Phó bí thư Tỉnh ủy rồi Bí thư Tỉnh ủy Bến Tre; Phó bí thư Thành ủy TP HCM, Chủ tịch UBND TP HCM.

        Cuối tháng 8/2021, ông Nguyễn Thành Phong được điều động giữ chức Phó ban Kinh tế Trung ương.';
        $new->status = '1';
        $new->view = 82;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Chủ tịch tỉnh Phú Yên "vi phạm đến mức phải xem xét kỷ luật"';
        $new->description = 'Chủ tịch tỉnh Phú Yên Trần Hữu Thế và nhiều lãnh đạo tỉnh này vi phạm gây hậu quả nghiêm trọng, đến mức phải xem xét kỷ luật, theo Ủy ban Kiểm tra Trung ương.';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/22/TranHuuThe-7892-1605499695-7751-1655897198.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=kcuu1VmiPXd5nFCHATsQ5g';
        $new->content = 'Tại kỳ họp ngày 20-22/6, Ủy ban Kiểm tra Trung ương đã xem xét kết quả kiểm tra khi có dấu hiệu vi phạm với Ban Thường vụ Tỉnh ủy Phú Yên nhiệm kỳ 2015-2020. Cơ quan này nhận thấy, Ban Thường vụ Tỉnh ủy Phú Yên đã vi phạm nguyên tắc tập trung dân chủ, quy chế làm việc; thiếu trách nhiệm, buông lỏng lãnh đạo, chỉ đạo, thiếu kiểm tra, giám sát.

        Hậu quả là Ban cán sự đảng UBND tỉnh, UBND tỉnh và nhiều tổ chức, cá nhân vi phạm quy định của Đảng, pháp luật của Nhà nước trong quản lý sử dụng đất đai, tài sản nhà nước; quản lý và bảo vệ rừng, tài nguyên khoáng sản; đầu tư, mua sắm trang thiết bị, vật tư y tế; thi tuyển công chức năm 2017-2018.

        Một số cán bộ, đảng viên trong đó có cả lãnh đạo chủ chốt của UBND tỉnh bị xử lý hình sự.
        Để xảy ra những vi phạm, khuyết điểm nêu trên, Ủy ban Kiểm tra Trung ương cho rằng trách nhiệm thuộc về các ông: Huỳnh Tấn Việt (Ủy viên Trung ương Đảng, Bí thư Đảng ủy Khối các cơ quan Trung ương, nguyên Bí thư Tỉnh ủy, nguyên Bí thư Đảng đoàn, nguyên Chủ tịch HĐND tỉnh); Trần Hữu Thế (Phó bí thư Tỉnh ủy, Bí thư Ban cán sự đảng, Chủ tịch UBND tỉnh).

        Ngoài ra còn có các ông Phạm Đình Cự (nguyên Phó bí thư Tỉnh ủy, nguyên Bí thư Ban cán sự đảng, nguyên Chủ tịch UBND tỉnh); Lê Văn Trúc (nguyên Phó chủ tịch Thường trực UBND tỉnh); Nguyễn Chí Hiến (nguyên Phó chủ tịch Thường trực UBND tỉnh); và một số lãnh đạo, nguyên lãnh đạo UBND tỉnh, sở, ngành, cơ quan, đơn vị của tỉnh Phú Yên.

        Cơ quan kiểm tra Trung ương cho rằng, những vi phạm nêu trên đã gây hậu quả nghiêm trọng, thiệt hại lớn tiền và tài sản của Nhà nước, gây bức xúc trong xã hội, ảnh hưởng xấu đến uy tín của cấp ủy, chính quyền địa phương, "đến mức phải xem xét, xử lý kỷ luật".

        Theo Ủy ban Kiểm tra Trung ương, liên quan đến những vi phạm nêu trên còn có trách nhiệm của ông Nguyễn Quang Thành, nguyên Ủy viên Ban cán sự đảng, nguyên Phó tổng Kiểm toán Nhà nước và một số cán bộ Kiểm toán Nhà nước.

        Tháng 5/2021, Công an tỉnh Phú Yên đã khởi tố vụ án Vi phạm quy định về quản lý, sử dụng tài sản nhà nước gây thất thoát lãng phí để điều tra dấu hiệu sai phạm trong đấu giá đất tại khu đô thị Nam Tuy Hòa, TP Tuy Hòa. Gần một tháng sau, ông Nguyễn Chí Hiến bị bắt với cáo buộc sai phạm trong đấu giá 262 lô đất ở khu vực trên.

        Trước khi vướng lao lý, ông Hiến từng trả lời báo chí phương án đấu giá các lô đất tại khu đô thị Nam Tuy Hòa đã được Ban cán sự Đảng UBND tỉnh trình xin ý kiến và Thường trực HĐND tỉnh, Ban thường vụ Tỉnh ủy Phú Yên thống nhất.';
        $new->status = '1';
        $new->view = 30;
        $new->hot = 1;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Ông Nguyễn Văn Hiếu làm Phó bí thư Thành uỷ TP HCM';
        $new->description = 'Bí thư TP Thủ Đức Nguyễn Văn Hiếu, 46 tuổi, được Bộ Chính trị chuẩn y làm Phó bí thư Thành uỷ TP HCM nhiệm kỳ 2020-2025.';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/22/nguyenvanhieu-8637-1655883194.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=rHUBk0-FnMyic76mNbtf7A';
        $new->content = 'Chiều 22/6, quyết định chuẩn y tân Phó bí thư Thành ủy TP HCM được Trưởng ban Tổ chức Trung ương Trương Thị Mai trao cho ông Nguyễn Văn Hiếu, sau ba tuần Ban Chấp hành Đảng bộ thành phố bỏ phiếu bầu.
        Ông Hiếu quê Bình Định, trình độ thạc sĩ Quản lý giáo dục, cử nhân Luật, cử nhân Hành chính. Tháng 1/2016, ông được bầu Ủy viên dự khuyết Trung ương Đảng.

        Trước đó, ông Hiếu làm Bí thư Thành đoàn TP HCM, Bí thư Quận ủy quận 2; Chủ nhiệm Ủy ban Kiểm tra Thành ủy và Bí thư Quận ủy quận 5 từ tháng 5/2020. Từ tháng 1/2021, ông được điều động làm Bí thư Thành uỷ TP Thủ Đức nhiệm kỳ 2020-2025.

        Gần năm rưỡi lãnh đạo Thành ủy Thủ Đức, ông Hiếu đã tham gia xây dựng đề án, trong đó kiến nghị Trung ương và TP HCM tạo nhiều cơ chế đặc thù để thành phố hơn 1,2 triệu dân phát triển, tăng trưởng nhanh. Năm 2021, Thủ Đức thu ngân sách đạt hơn 10.000 tỷ đồng, vượt con số 8.400 tỷ đồng TP HCM giao.

        Người đứng đầu Thành ủy Thủ Đức sau khi ông Hiếu chuyển đi hiện chưa được công bố.

        Như vậy, Thường trực Thành uỷ TP HCM hiện có Bí thư Nguyễn Văn Nên cùng 4 Phó bí thư gồm: ông Phan Văn Mãi (Chủ tịch UBND thành phố); bà Nguyễn Thị Lệ (Chủ tịch HĐND thành phố); ông Nguyễn Hồ Hải và ông Nguyễn Văn Hiếu.

        Trước đó, hôm 4/6 Thành ủy TP HCM đã trao quyết định của Bộ Chính trị và Ban Bí thư chỉ định ông Vũ Hải Quân, 48 tuổi, Ủy viên Trung ương Đảng, Giám đốc Đại học Quốc gia TP HCM và bà Lê Thị Hờ Rin, 45 tuổi, Phó chủ nhiệm Ủy ban Kiểm tra Thành ủy thành phố tham gia Ban Chấp hành Đảng bộ TP HCM nhiệm kỳ 2020-2025.';
        $new->status = '1';
        $new->view = 25;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Chân dung Hoa hậu Hoàn vũ Việt Nam 2022 Ngọc Châu';
        $new->description = 'TPO - Trước khi đăng quang Hoa hậu Hoàn vũ Việt Nam 2022, Ngọc Châu được mệnh danh là cô gái dùng cả thanh xuân để đi thi nhan sắc.';
        $new->image = 'https://photo-cms-tpo.zadn.vn/w645/Uploaded/2022/jaetgs/2022_06_26/0188-ck-muvn-2022-photo-kiengcan-team-1544.jpg';
        $new->content = 'Tối 25/6, đêm chung kết Hoa hậu Hoàn vũ Việt Nam 2022 đã diễn ra với sự đăng quang của thí sinh Nguyễn Thị Ngọc Châu, sinh năm 1994 đến từ Tây Ninh.

        Sự đăng quang của Ngọc Châu không nằm ngoài dự đoán của nhiều người khi cô được đánh giá là một "gà chiến" với thành tích thi thố sắc đẹp trong và ngoài nước ấn tượng.
        Ngọc Châu sinh ra trong một gia đình có hoàn cảnh tương đối khó khăn ở vùng đất Tây Ninh. Cha cô mất sớm, để lại mẹ cô một mình nuôi ba người con, từ nhỏ Ngọc Châu đã có mong muốn trở thành một người mẫu chuyên nghiệp.
        Với ước mong được làm người mẫu từ nhỏ, Ngọc Châu đã đăng ký tham dự cuộc thi Vietnams Next Top Mode 2016.

        Sau một nửa chặng đường, Ngọc Châu đã có những màn bứt phá ấn tượng và biết cách tận dụng những ưu điểm của mình đó là một gương mặt xinh đẹp, hình thể quyến rũ và biểu cảm đa dạng, cô đã trưởng thành dần qua các vòng thi.
        Tối 2/10/2016, Ngọc Châu đăng quang ngôi vị quán quân trong đêm chung kết Vietnams Next Top Model 2016, trở thành thí sinh có chiều cao thấp nhất trong số 7 quán quân trước đây.

        Đăng quang Hoa hậu Siêu quốc gia Việt Nam 2018

        Sau 2 năm đăng quang quán quân Vietnams Next Top Model 2016, Ngọc Châu có màn chuyển hướng bất ngờ khi quyết định đăng ký tham dự cuộc thi Hoa hậu Siêu quốc gia Việt Nam 2018.
        Ngọc Châu đã vượt qua các đối thủ mạnh như Trương Mỹ Nhân, Hoàng Vũ Hiên để đăng quang ngôi vị cao nhất và giành quyền đại diện cho Việt Nam tham dự cuộc thi Hoa hậu Siêu quốc gia 2019 tại Ba Lan.

        Top 10 Hoa hậu Siêu quốc gia 2019

        Với những kinh nghiệm dày dặn đã tích luỹ được từ những cuộc thi trong nước, Ngọc Châu được kỳ vọng rất nhiều khi đại diện Việt Nam tham dự Hoa hậu Siêu quốc gia 2019.

        Trong suốt quá trình tham gia cuộc thi, Ngọc Châu luôn ghi điểm bởi nhan sắc xinh đẹp, phong thái cuốn hút và cách giao lưu tinh tế, thông minh bằng tiếng Anh.

        Sau các màn trình diễn cùng 76 thí sinh trên sân khấu đêm chung kết, Ngọc Châu được xướng tên vào Top 10 chung cuộc. Dù không mang về vương miện nhưng Ngọc Châu đã giành được giải thưởng phụ Hoa hậu Siêu quốc gia châu Á.

        Trước chung kết, Ngọc Châu đã đạt thành tích giải nhì phần thi Hoa hậu Thanh lịch và vào bán kết phần thi vấn đáp. Cô có phong độ tốt suốt 3 tuần tham gia cuộc thi tại Ba Lan, liên tục nằm trong danh sách 10 thí sinh được khán giả yêu thích nhất.

        Hoa hậu Hoàn vũ Việt Nam 2022

        Sau những thành tích ấn tượng từ trong nước đến quốc tế, Ngọc Châu gây bất ngờ khi đăng ký tham dự Hoa hậu Hoàn vũ Việt Nam 2022 và đối đầu với những đối thủ dày dặn kinh nghiệm như Hương Ly, Hoàng Phương, Bùi Quỳnh Hoa...

        Sinh năm 1994, tuổi tác được coi là yếu tố bất lợi của Ngọc Châu khi thi thố cùng các thí sinh trẻ đẹp khác. Mặc dù vậy, bản lĩnh và kinh nghiệm là thế mạnh của Ngọc Châu mà không phải cô gái nào cũng có được.
        Giữ phong độ ổn định qua tất cả các phòng thi, Ngọc Châu đã bứt phá trong đêm chung kết bằng sự điềm tĩnh và thông minh khi toả sáng ở phần thi quan trọng đó là trả lời ứng xử và cuối cùng đăng quang Hoa hậu Hoàn vũ Việt Nam 2022 một cách thuyết phục.
        Với những nỗ lực và chiến thắng đầy ấn tượng, Ngọc Châu được hy vọng sẽ tiếp tục lập nên thành tích cao cho nhan sắc Việt khi đại diện Việt Nam tham dự Miss Universe 2022 vào cuối năm nay.
        ';
        $new->status = '1';
        $new->view = 25;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 4;
        $new->save();

        $new = new News();
        $new->title = 'Tổng hợp 6 trang phục mới nhất sẽ được ra mắt trong Liên Quân';
        $new->description = 'Sau khi ra mắt Sổ Sứ Mệnh 42 cùng loạt dự án cộng tác trang phục, Liên Quân Mobile lại một lần nữa đem đến cho người chơi những sự phấn khích tột độ với loạt skin mới cực chất. Và hãy cùng mình tổng hợp lại những vị tướng sẽ có ngoại hình mới trong bản cập nhật sắp tới này nhé.';
        $new->image = 'https://cdn.sforum.vn/sforum/wp-content/uploads/2022/06/Hack-Sprayer.jpg';
        $new->content = 'Trang phục 1: Payna
        Trên thực tế đây không phải là một bộ trang phục mới mà là ngoại hình được làm lại của vị tướng trợ thủ được mệnh danh là “Bình máu di động” này. Tuy nhiên, khác với những vị tướng từng được làm lại ngoại hình, Payna trong hình dáng mới này thậm chí còn không giữ lại bất kì chi tiết nào của hình dáng cũ. Cô nàng này cũng là trường hợp đầu tiên được nhà phát hành thay đổi hoàn toàn về ngoại hình.
        Với đợt thay đổi này, chắc chắn không chỉ ngoại hình mà ngay cả hiệu ứng chiêu thức của Payna sẽ có sự khác biệt, trở nên lung linh và huyền bí hơn. Điều này rất có thể sẽ biến Payna trở thành quân bài hot pick trong thời gian tới. Mình chỉ thắc mắc là liệu sau Payna, Baldum có bị lược bỏ mất hai chân đi không nhỉ?

        Trang phục 2: Lauriel
        Theo một số tin tức từ các hội nhóm trên Facebook, skin mới này có tên gọi là Lauriel Tiệc Tốt Nghiệp và là trang phục bậc S+ có đi kèm hiệu ứng đặc biệt. Cá nhân mình nhận xét là bộ trang phục này có phần sơ sài và khá giống với Lauriel Hoa Khôi Giáng Sinh nhưng được làm cho tối giản hơn khi thêm bớt một vài chi tiết. Thú thực, ban đầu mình vẫn nghĩ đây sẽ là một trang phục bậc A không hiệu ứng nhưng sau cùng thì chúng ta đã có những video về bộ kĩ năng của cô nàng trên Youtube.
        Trang phục 3: Mina
        Đã khá lâu rồi cô nàng Mina của chúng ta mới lại có trang phục mới kể từ sau sự kiện ra mắt nhóm nhạc Wave. Điều này rõ ràng hơi có chút bất công bởi vị tướng này là cái tên thường xuyên được lựa chọn cho cả đấu giải lẫn đánh rank. Sắp tới đây, Mina sẽ có một bộ trang phục cùng chủ đề với Volkath, có liên quan đến Ai Cập.
        Song bộ trang phục mới này sẽ không giống với Mina Lưỡi Hái Hoàng Kim mà thay vào đó là đậm chất vùng đất kim tự tháp với những biểu tượng đặc trưng của nền văn hóa này. Vì là cùng chủ đề với Volkath nên cũng không loại trừ khả năng đầy là trang phục của SSM Mùa 43. Nếu điều này là sự thật thì doanh thu sắp tới của Gà Rán chắc chắn sẽ bao gồm tiền của tác giả trong đó.

        Trang phục 4: Volkath
        Như đã nói ở trên, Volkath lần này sẽ có một bộ trang phục mới đậm chất Ai Cập. Một điểm đặc biệt trong skin mới này đó là Volkath sẽ trở thành một vị tướng da nâu. Đây sẽ là một chi tiết thú vị và vô cùng phù hợp với chủ đề Ai Cập. Ngoài ra, nhiều người cũng cho rằng đây là món quà của AOV dành tặng cho các khu vực mới, nơi có phần đông là các game thủ da màu.
        Ngoài bản thân Volkath, không thể không kể đến hình tượng chú ngựa của hắn trong bộ trang phục tới. Nói một cách công bằng, đây là ngoại hình đẹp nhất từ trước đến nay của chú ngựa này và mình có hơi lo lắng một chút. Bởi nếu được thiết kế xuất sắc như vậy thì khó có chuyện đây là skin nằm trong Sổ Sứ Mệnh.

        Trang phục 5: Wukong
        Ngoài Mina và Volkath, nhiều khả năng Wukong cũng sẽ có một bộ trang phục đậm chất Ai Cập. Điều này được thể hiện khá rõ trên họa tiết của gậy như ý. Cá nhân mình thực sư thích phong cách mới này của Tề Thiên Đại Thánh: Pha trộn yếu tố phương Đông và Ai Cập trên cùng một bộ trang phục. Và đây cũng sẽ là lần đầu tiên mà Wukong của Liên Quân sở hữu một bộ lông đen.
        Không có ý gì đâu nhưng nhìn mặt của Wukong trong bộ skin mới này làm mình có chút liên tưởng tới Ngộ Không trong Liên Minh Tốc Chiến. Nhưng dù sao cả hai đều được xây dựng từ một hình tượng gốc nên thần thái có nét tương đồng cũng là chuyện bình thường.

        Trang phục 6: Rouie
        Trang phục mới cuối cùng trong danh sách này thuộc về cô nàng trợ thủ Rouie. Đây quả thực là một ngoại hình làm nổi bật sự dễ thương và nữ tính của vị tướng này. Tuy nhìn vào các chi tiết trong splash art, nhiều khả năng đây sẽ là một bộ trang phục bậc A nhưng mình tin nó sẽ là một skin mà không game thủ nào muốn bỏ lỡ.
        Nhân tiện đây cho mình hỏi có bạn nào biết thông tin về Rouie Hỏa Long không? Mình thấy bộ trang phục này đã xuất hiện ở một số server nhưng tại máy chủ Mặt Trời thì vẫn bặt vô âm tín. Liệu nó có thể ra mắt sớm hơn bộ skin mới này dưới hình thức mở bán giống như trường hợp của Celica Đếm Cừu không?';
        $new->status = '1';
        $new->view = 25;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 4;
        $new->save();

        $new = new News();
        $new->title = 'PUBG Mobile sắp triển khai hệ thống nhận dạng giọng nói nhằm “khóa mõm” các game thủ toxic';
        $new->description = 'Trong PUBG Mobile Dev Talk 2.0 phần 3, các nhà phát triển đã nói rằng họ sẽ mang đến một hệ thống nhận dạng giọng nói mới và cải tiến để lọc những từ ngữ độc hại khỏi các cuộc hội thoại trong game. Động thái này có lẽ sẽ giúp game thủ có cái nhìn thiện cảm hơn với nhà phát triển Krafton và đây sẽ là một bước đi hoàn toàn mới giúp mở ra một môi trường lành mạnh trong game online.';
        $new->image = 'https://cdn.sforum.vn/sforum/wp-content/uploads/2022/06/PUBG-Mobile-3-1.jpg';
        $new->content = 'Mời các bạn tham gia cộng đồng game thủ S-Games trên Discord, sân chơi mới cho các game thủ có thể trao đổi về các tựa game hot trên thị trường, chia sẻ kinh nghiệm chơi game, bắt cặp leo rank và trò chuyện cùng nhau sôi nổi. Tại Discord S-Games, bạn còn được nhận các code độc quyền những tựa game mới nhanh nhất, hấp dẫn nhất. Còn chờ gì nữa, THAM GIA NGAY DISCORD S-GAMES!

        Việc game thủ sử dụng những từ ngữ thô tục để xúc phạm người khác hoặc thể hiện văn hóa lùn đã không còn quá xa lạ trong các tựa game online nói chung và PUBG Mobile nói riêng. Hành động này không chỉ tạo ra những khoảnh khắc giận dữ, mà nó còn khiến những người chơi khác khó chịu và đôi khi dẫn tới những tình huống troll game không đáng có, gây ảnh hưởng đến kết quả trận đấu của cả đội.
        Một số trường hợp tồi tệ hơn diễn ra trong game, như việc có những nhận xét mang tính xúc phạm và phân biệt chủng tộc thường xảy ra trong các cuộc trò chuyện trên máy bay là điều không thể chấp nhận được. Vì vậy, nhà phát triển sẽ triển khai một hệ thống nhận dạng giọng nói mới, nhằm cắt giảm việc sử dụng các từ ngữ xúc phạm và biến môi trường trong game trở nên lành mạnh hơn. Được biết, sẽ có những hình phạt thích đáng dành cho những kẻ vi phạm như trừ điểm uy tín, cấm chat hoặc trong những trường hợp tệ nhất có thể sẽ là việc khóa tài khoản.
        Nhìn chung, với động thái quyết liệt của nhà phát triển, chúng ta hoàn toàn có thể kỳ vọng vào một môi trường game lành mạnh hơn trong tương lai không xa của PUBG Mobile. Nếu họ thành công, nguồn cảm hứng này có thể lan tỏa và giải quyết các vấn nạn tương tự trong những tựa game online khác.';
        $new->status = '1';
        $new->view = 25;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 4;
        $new->save();

        $new = new News();
        $new->title = 'Thức tỉnh sức mạnh, triệu tập và chiến đấu với Ngày Triệu Tập Garena Free Fire';
        $new->description = 'Chuỗi sự kiện hàng năm trở lại với phiên bản thứ tư Ngày Triệu Tập vào ngày 17 tháng 6.';
        $new->image = 'https://lh3.googleusercontent.com/1NHqPRUACCO3PTb1-5TOgmR7UiPjS5uiHTWrhaPn3A_LGnbtXBGtOvFm8Ie-P-EbC1pl5q3oK-ICY6vmaKzEnx0HMhWWlIGK8bRSFLnm3RBWDL22BYMOXQE_TyhUAsY9aT16hB1zx-I8GkZ4Vg';
        $new->content = 'Người chơi sẽ được đắm mình với một cốt truyện hoàn toàn mới liên quan đến các nhân vật từ các thế hệ trước tái hợp dưới sự dẫn dắt của Tyson Brontes (Thần Sư Tối Thượng)

        “Thức tỉnh sức mạnh, triệu tập và chiến đấu”, khẩu hiệu của sự kiện năm nay, là lời kêu gọi tập hợp tất cả người chơi tham gia sự kiện và khám phá tiềm năng vô hạn của họ trong Free Fire và trong cuộc sống thực
        Hà Nội, ngày 16 tháng 6 năm 2022 - Chuỗi sự kiện Rampage nổi tiếng của Garena Free Fire trở lại với phiên bản thứ tư và gây ấn tượng mạnh nhất vào tháng 6 này! Với tiêu đề Ngày Triệu Tập, sự kiện sẽ giới thiệu cho người hâm mộ và người chơi một cốt truyện mới thú vị, và là lần đầu tiên tất cả các nhân vật trong ba chiến dịch Rampage trước đây đoàn kết dưới quyền thế hệ của Tyson Brontes (Thần Sư Tối Thượng) để cứu thành phố . Người chơi có thể tiếp thêm sức mạnh cho tinh thần Ngày Triệu Tập của mình và chuẩn bị cho trận chiến bằng cách xem video tóm tắt về các sự kiện đã qua.

        Bắt đầu từ ngày 17 tháng 6, người hâm mộ và người chơi có thể mong đợi một đội hình siêu khủng gồm các sự kiện trong trò chơi, giao diện và chế độ chơi hoàn toàn mới, trang phục nhân vật, phần thưởng, sảnh chờ và hơn thế nữa vào Ngày Triệu Tập 25 tháng 6.

        Một vật phẩm bí ẩn là tâm điểm của trận chiến và tranh chấp

        Trong Ngày Triệu Tập, Thần Sư Tối Thượng sẽ hợp nhất các anh hùng trước đó để chiến đấu chống lại ba nhân vật phản diện mới - lực lượng Horizon - mỗi người đều sở hữu sức mạnh vô cùng mạnh mẽ liên quan đến các nguyên tố khác nhau. Các nhân vật phản diện là Zephyr (Cuồng Phong), Misty (Thiên Vũ) và Nimbus (Hắc Vân).
        Thần Sư Tối Thượng và các anh hùng được triệu tập sẽ hợp lực chống lại lực lượng Horizon để giành lấy Mật Thư Tối Thượng, một vật phẩm bí ẩn chứa vũ khí mạnh mẽ. Tương lai của thành phố đang bị đe dọa khi một trận chiến sắp diễn ra để đảm bảo ý định xấu xa của lực lượng Horizon không thành hiện thực.

        Trong Ngày Triệu Tập, người hâm mộ và người chơi Free Fire sẽ là một trong những người đầu tiên trên thế giới xem trận chiến này diễn ra.
        Nhiều điều bất ngờ thú vị khác đang chờ đợi người hâm mộ và người chơi - hãy theo dõi để biết thêm thông tin cập nhật và tin tức mới nhất về Free Fire trên Facebook, Instagram và YouTube.

        Tải xuống Free Fire trên Ứng dụng Apple iOS hoặc cửa hàng Google Play.

        Free Fire MAX cũng có sẵn trên Ứng dụng Apple iOS và cửa hàng Google Play.';
        $new->status = '1';
        $new->view = 25;
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 4;
        $new->save();
    }


    public function importComment()
    {

        $comment = new Comment();
        $comment->content = "Tôi nghĩ rằng nụ cười rạng rỡ nhất trong cuộc đời tôi có thể là màn hình máy tính của tôi.";
        $comment->startus = "approved";
        $comment->new_id = rand(1, 4);
        $comment->save();

        $comment = new Comment();
        $comment->content = "Theo thẩm mỹ của loài lợn, tôi về cơ bản là một mỹ nhân.";
        $comment->startus = "pending";
        $comment->new_id = rand(1, 4);
        $comment->save();
    }

    public function importEmail()
    {

        $Newsletter = new Newsletter();
        $Newsletter->email = "chieman2k3@gmail.com";
        $Newsletter->save();

        $Newsletter = new Newsletter();
        $Newsletter->email = "vantoan092002@gmail.com";
        $Newsletter->save();

        $Newsletter = new Newsletter();
        $Newsletter->email = "votuant2@gmail.com";
        $Newsletter->save();

        $Newsletter = new Newsletter();
        $Newsletter->email = "tam.nguyen@codegym.vn ";
        $Newsletter->save();


        for($i=0;$i<10;$i++) {
            $this->faker = Faker::create();
            $Newsletter = new Newsletter();
            $Newsletter->email = $this->faker->email;
            $Newsletter->save();
        }
    }
}
