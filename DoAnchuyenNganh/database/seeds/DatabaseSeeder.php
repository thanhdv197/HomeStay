<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(AccommodationTypesTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(PostImgsTableSeeder::class);
        $this->call(ServicesPostsTableSeeder::class);
    }
}

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            [
                'city_name'=>'Hồ Chí Minh',
                'city_img'=>'imgs/cities/hcm.jpg'
            ],
            [
                'city_name'=>'Hà Nội',
                'city_img'=>'imgs/cities/hanoi.jpg'
            ],
            [
                'city_name'=>'Cần Thơ',
                'city_img'=>'imgs/cities/cantho.jpg'
            ],
            [
                'city_name'=>'Vũng Tàu',
                'city_img'=>'imgs/cities/vungtau.jpg'
            ],
            [
                'city_name'=>'Nha Trang',
                'city_img'=>'imgs/cities/nhatrang.jpg'
            ],
        ]);
    }
}

class AccommodationTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accommodation_types')->insert([
            [
                'accommodation_type_name'=>'Căn hộ',
                'accommodation_type_img'=>'imgs/accommodation_type/canho.jpg'
            ],
            [
                'accommodation_type_name'=>'Biệt Thự',
                'accommodation_type_img'=>'imgs/accommodation_type/bietthu.jpg'
            ],
            [
                'accommodation_type_name'=>'Khách sạn',
                'accommodation_type_img'=>'imgs/accommodation_type/khachsan.jpg'
            ],
            [
                'accommodation_type_name'=>'Phòng trọ',
                'accommodation_type_img'=>'imgs/accommodation_type/phongtro.jpg'
            ]
        ]);
    }
}

class RoomTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_types')->insert([
            [
                'room_type_name'=>'Phòng đơn',
                'number_adults'=>1,
                'number_children'=>1
            ],
            [
                'room_type_name'=>'Phòng đôi',
                'number_adults'=>2,
                'number_children'=>1
            ],
            [
                'room_type_name'=>'Phòng bốn',
                'number_adults'=>4,
                'number_children'=>2
            ],
            [
                'room_type_name'=>'Phòng sáu',
                'number_adults'=>6,
                'number_children'=>3
            ],
            [
                'room_type_name'=>'Phòng tình nhân',
                'number_adults'=>2,
                'number_children'=>0
            ],
        ]);
    }
}

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'service_name'=>'Wifi miễn phí'
            ],
            [
                'service_name'=>'Phòng không hút thuốc lá'
            ],
            [
                'service_name'=>'Lò sưởi'
            ],
            [
                'service_name'=>'giặt ủi'
            ],
            [
                'service_name'=>'Điều hòa'
            ],
        ]);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Dương Văn Thanh',
                'birthday'=>'02/01/1997',
                'phonenumber'=>'0396709355',
                'address'=>'Thành phố HCM',
                'email'=>'duongvanthanh200@gmail.com',
                'username'=>'admin',
                'password'=>Hash::make('123'),
                'level'=>'admin',
                'avatar'=>'imgs/users/1.jpg'
            ],
            [
                'name'=>'Thanh Dương',
                'birthday'=>'02/01/1997',
                'phonenumber'=>'0396709355',
                'address'=>'Thành phố HCM',
                'email'=>'duongvanthanh196@gmail.com',
                'username'=>'user',
                'password'=>Hash::make('123'),
                'level'=>'user',
                'avatar'=>'imgs/users/2.jpg'
            ],
            [
                'name'=>'Thanh Dương 2',
                'birthday'=>'02/01/1997',
                'phonenumber'=>'0396709355',
                'address'=>'Thành phố HCM',
                'email'=>'duongvanthanh2@gmail.com',
                'username'=>'user2',
                'password'=>Hash::make('123'),
                'level'=>'user',
                'avatar'=>'imgs/users/2.jpg'
            ],
            [
                'name'=>'Thanh Dương 3',
                'birthday'=>'02/01/1997',
                'phonenumber'=>'0396709355',
                'address'=>'Thành phố HCM',
                'email'=>'duongvanthanh3@gmail.com',
                'username'=>'user3',
                'password'=>Hash::make('123'),
                'level'=>'user',
                'avatar'=>'imgs/users/2.jpg'
            ],
        ]);
    }
}

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id'=>2,
                'accommodation_type_id'=>3,
                'city_id'=>1,
                'accommodation_name'=>'Vĩnh Viễn',
                'accommodation_describe'=>'Raw denim you probably h k Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui',
                'accommodation_address'=>'khu phố 6 phường linh trung quận thủ đức',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Frankness applauded by suonsulnded do entrance of landlord moreoseptember shameless am sincerity oh recommend. Gate tell man day that who',
            ],
            [
                'user_id'=>2,
                'accommodation_type_id'=>2,
                'city_id'=>1,
                'accommodation_name'=>'Vĩnh Viễn',
                'accommodation_describe'=>'Phòng ở thoáng mát, sạch sng cho mọi du khách muốn đặt chân đến vùng đất sài gòn đầy nắng và nhiều mây như vậy',
                'accommodation_address'=>'khu phố 6, phường linh trung, quận thủ đức',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'khung cảnh lãng mạn, thơ mông. bên cạnh là khu du lịc suối tiên',
            ],
            [
                'user_id'=>2,
                'accommodation_type_id'=>3,
                'city_id'=>2,
                'accommodation_name'=>'Vĩnh Viễn',
                'accommodation_describe'=>'Raw denim you probably havown alior, williamsburg carles vegan heleffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui',
                'accommodation_address'=>'khu phố 6 phường linh trụng quận thủ đức',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Frankness applauded by supported laress in. Nay was appear entire ladies. Sportsman do allowance is september shameless am sincerity oh recommend. Gate tell man day that who',
            ],
            [
                'user_id'=>2,
                'accommodation_type_id'=>3,
                'city_id'=>4,
                'accommodation_name'=>'Vĩnh Viễn',
                'accommodation_describe'=>'Raw denim you probably havenempor, williamsburg carles vegat butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui',
                'accommodation_address'=>'khu phố 6',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Frankness applauded by supported yeisite do commanded. Doubtful offeer is mistress in. Nay was appear entire ladies. Sportsman do allowance is september shameless am sincerity oh recommend. Gate tell man day that who',
            ],
            [
                'user_id'=>3,
                'accommodation_type_id'=>3,
                'city_id'=>1,
                'accommodation_name'=>'Vĩnh kí',
                'accommodation_describe'=>'Tất cả các phòng tại khách sạn đều có bàn làm việc, TV màn hình phẳng và phòng tắm riêng với chậu rửa vệ sinh cùng đồ vệ sinh cá nhân miễn phí. Một số phòng còn đi kèm khu vực ghế ngồi. Quý khách cũng có thể sử dụng phòng tắm chung với máy sấy tóc',
                'accommodation_address'=>'khu phố 6',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Tọa lạc tại vị trí lý tưởng ở khu Bãi biển Mỹ Khê thuộc thành phố Đà Nẵng, Roliva Hotel & Apartment Danang có xe đạp cho khách sử dụng miễn phí và hồ bơi ngoài trời cũng như trung tâm thể dục. Các điểm tham quan trong khu vực bao gồm Cầu Sông Hàn, cách khách sạn chưa đến 1 km, hoặc Cầu tàu tình yêu, cách đó 1,9 km',
            ],
            [
                'user_id'=>3,
                'accommodation_type_id'=>1,
                'city_id'=>2,
                'accommodation_name'=>'Vĩnh kí',
                'accommodation_describe'=>'Tất cả các phòng tại khách sạn đều có bàn làm việc, TV màn hình phẳng và phòng tắm riêng với chậu rửa vệ sinh cùng đồ vệ sinh cá nhân miễn phí. Một số phòng còn đi kèm khu vực ghế ngồi. Quý khách cũng có thể sử dụng phòng tắm chung với máy sấy tóc',
                'accommodation_address'=>'khu phố 6',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Tọa lạc tại vị trí lý tưởng ở khu Bãi biển Mỹ Khê thuộc thành phố Đà Nẵng, Roliva Hotel & Apartment Danang có xe đạp cho khách sử dụng miễn phí và hồ bơi ngoài trời cũng như trung tâm thể dục. Các điểm tham quan trong khu vực bao gồm Cầu Sông Hàn, cách khách sạn chưa đến 1 km, hoặc Cầu tàu tình yêu, cách đó 1,9 km',
            ],
            [
                'user_id'=>3,
                'accommodation_type_id'=>3,
                'city_id'=>1,
                'accommodation_name'=>'Vĩnh kí',
                'accommodation_describe'=>'Tất cả các phòng tại khách sạn đều có bàn làm việc, TV màn hình phẳng và phòng tắm riêng với chậu rửa vệ sinh cùng đồ vệ sinh cá nhân miễn phí. Một số phòng còn đi kèm khu vực ghế ngồi. Quý khách cũng có thể sử dụng phòng tắm chung với máy sấy tóc',
                'accommodation_address'=>'khu phố 6',
                'accommodation_status'=>'đã duyệt',
                'accommodation_img'=>'imgs/room/04-sp.jpg',
                'scenery_around'=>'Tọa lạc tại vị trí lý tưởng ở khu Bãi biển Mỹ Khê thuộc thành phố Đà Nẵng, Roliva Hotel & Apartment Danang có xe đạp cho khách sử dụng miễn phí và hồ bơi ngoài trời cũng như trung tâm thể dục. Các điểm tham quan trong khu vực bao gồm Cầu Sông Hàn, cách khách sạn chưa đến 1 km, hoặc Cầu tàu tình yêu, cách đó 1,9 km',
            ],
        ]);
    }
}

class PromotionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('promotions')->insert([
            [
                'promotion_name'=>'khuyến mãi tết',
                'assign'=>'Mọi đối tượng',
                'start_day'=>'2019/05/22',
                'end_day'=>'2019/05/26',
                'discount'=>0.2,
            ],
            [
                'promotion_name'=>'khuyến mãi trunng thu',
                'assign'=>'Mọi đối tượng',
                'start_day'=>'2019/07/22',
                'end_day'=>'2019/08/22',
                'discount'=>0.2,
            ]
        ]);
    }
}

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_name'=>'phòng 1',
                'utilities'=>'có 1 giường, 1 wc và 1 nhà tắm',
                'area'=>20,
                'price'=>150000,
                'room_status'=>'trống',
                'room_type_id'=>1,
                'promotion_id'=>1,
                'post_id'=>1
            ],
            [
                'room_name'=>'phòng 2',
                'utilities'=>'có 1 giường, 1 wc và 1 nhà tắm',
                'area'=>20,
                'price'=>150000,
                'room_status'=>'trống',
                'room_type_id'=>1,
                'promotion_id'=>1,
                'post_id'=>1
            ],
            [
                'room_name'=>'phòng 2',
                'utilities'=>'có 1 giường, 1 wc và 1 nhà tắm',
                'area'=>20,
                'price'=>150000,
                'room_status'=>'trống',
                'room_type_id'=>1,
                'promotion_id'=>1,
                'post_id'=>2
            ],
            [
                'room_name'=>'phòng 2',
                'utilities'=>'có 2 giường, 1 wc và 1 nhà tắm',
                'area'=>20,
                'price'=>150000,
                'room_status'=>'trống',
                'room_type_id'=>2,
                'promotion_id'=>1,
                'post_id'=>2
            ],
        ]);
    }
}

class PostImgsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('post_imgs')->insert([
            [
                'post_id'=>1,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>1,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>2,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>2,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>2,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>3,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>3,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>4,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
            [
                'post_id'=>4,
                'post_img_link'=>'imgs/room/04-sp.jpg',
            ],
        ]);
    }
}

class ServicesPostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services_posts')->insert([
            [
                'service_id'=>1,
                'post_id'=>1
            ],
            [
                'service_id'=>2,
                'post_id'=>1
            ],
            [
                'service_id'=>3,
                'post_id'=>1
            ],
            [
                'service_id'=>1,
                'post_id'=>2
            ],
            [
                'service_id'=>2,
                'post_id'=>2
            ],
            [
                'service_id'=>3,
                'post_id'=>3
            ],
            [
                'service_id'=>1,
                'post_id'=>3
            ],
        ]);
    }
}