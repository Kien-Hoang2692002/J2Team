drop table if exists khach_hang;
create table khach_hang (
	ma int not null,
	ho_ten varchar(50) not null,
	so_dien_thoai char(15) not null,
	dia_chi text not null,
	gioi_tinh char(3),
	ngay_sinh date not null,
	primary key(ma),
	check (gioi_tinh = 'Nam' or gioi_tinh = 'Nu' )
)
-- Tạo bảng lưu thông tin khách hàng (mã, họ tên, số điện thoại, địa chỉ, giới tính, ngày sinh)
-- Thêm 5 khách hàng
insert into khach_hang(ma,ho_ten,so_dien_thoai,dia_chi,gioi_tinh,ngay_sinh)
values (1,'Kien',012345678,'Ha Noi','Nam','2002-01-01'),
 		(2,'Nam',012345678,'Ha Noi','Nam','2002-03-01'),
 		(3,'Long',012344678,'Ha Noi','Nu','2002-01-01'),
 		(4,'Nga',012346678,'Ha Noi','Nu','2003-04-01'),
 	 	(5,'Anh',012335678,'Ha Noi','Nam','2002-03-01');
-- Hiển thị chỉ họ tên và số điện thoại của tất cả khách hàng
select ho_ten,so_dien_thoai from khach_hang;
-- Cập nhật khách có mã là 2 sang tên Tuấn
update khach_hang set ho_ten = 'Tuan' where ma = 2;
-- Xoá khách hàng có mã lớn hơn 3 và giới tính là Nam
delete from khach_hang where ma > 4 and gioi_tinh = 'Nam';
-- (*) Lấy ra khách hàng sinh tháng 1
select *from khach_hang where date_part('month',ngay_sinh)=2003; 
-- (*) Lấy ra khách hàng có họ tên trong danh sách (Anh,Minh,Đức) và giới tính Nam hoặc chỉ cần năm sinh trước 2000
select *from khach_hang where ( ho_ten in('Anh','Minh','Duc') and gioi_tinh ='Nam') or date_part('year',ngay_sinh) > 2000 ; 
-- (**) Lấy ra khách hàng có tuổi lớn hơn 18
select *, date_part('year',ngay_sinh) as nam_sinh from khach_hang; 
select *from khach_hang 
	where (date_part('year', now()) - date_part('year',ngay_sinh)) > 18;
-- (**) Lấy ra 3 khách hàng mới nhất
select *from khach_hang order by ma desc limit 5;--moi nhat
select *from khach_hang order by ma asc limit 5; --cu nhat
-- (**) Lấy ra khách hàng có tên chứa chữ T
select *from khach_hang where ho_ten like '%n%';
-- (***) Thay đổi bảng sao cho chỉ nhập được ngày sinh bé hơn ngày hiện tại
alter table khach_hang
add check (date_part('day',ngay_sinh) < date_part('day', now()));
-- (***) Thay đổi bảng sao cho chỉ nhập được giới tính nam với bạn tên Long
alter table khach_hang
add check((gioi_tinh = 'Nam' and ho_ten ='Long') or ho_ten != 'Long');
SELECT date_part('day', now());

--BUOI 5--
-- Sếp yêu cầu bạn thiết kế cơ sở dữ liệu quản lý lương nhân viên
-- Với điều kiện:
-- mã nhân viên không được phép trùng
-- lương là số nguyên dương
-- tên không được phép ngắn hơn 2 ký tự
-- tuổi phải lớn hơn 18
-- giới tính mặc định là nữ
-- ngày vào làm mặc định là hôm nay
-- (*) nghề nghiệp phải nằm trong danh sách ('IT','kế toán','doanh nhân thành đạt')
-- tất cả các cột không được để trống
drop table if exists nhan_vien;
create table nhan_vien (
	id_nhan_vien int not null,
	ho_ten varchar(50) not null,
	luong int not null,
	job varchar(50) not null,
	ngay_sinh date not null,
	gender char(3) default 'Nu',
	day_start date not null default current_date,
	primary key(id_nhan_vien),
	check( luong >= 0),
	check (gender = 'Nam' or gender = 'Nu' ),
	check (date_part('year', now()) - date_part('year',ngay_sinh) > 18),
	check (job in ('IT','kế toán','doanh nhân thành đạt')),
	check (length(ho_ten) >= 2)
)
-- 1.Công ty có 5 nhân viên
insert into nhan_vien(id_nhan_vien,ho_ten,ngay_sinh,luong,job,gender,day_start)
values (1,'Kien','2000-01-02',500,'IT','Nam',default),
 		(2,'Tuan','2001-03-04',300,'kế toán','Nam',default),
 		(3,'Long','1999-05-07',400,'doanh nhân thành đạt','Nu',default),
 		(4,'Nga','1998-08-09',100,'IT','Nu',default),
 	 	(5,'Anh','2002-09-26',100,'IT','Nam',default);
-- 2.Tháng này sinh nhật sếp, sếp tăng lương cho nhân viên sinh tháng này thành 100. (*: tăng lương cho mỗi bạn thêm 100)
update nhan_vien set luong = 100
where date_part('month',ngay_sinh) = date_part('month',now()) ;
update nhan_vien set luong = luong + 100;
-- 3.Dịch dã khó khăn, cắt giảm nhân sự, cho nghỉ việc bạn nào lương dưới 50. (*: xoá cả bạn vừa thêm 100 nếu lương cũ dưới 50). (**: đuổi cả nhân viên mới vào làm dưới 2 tháng)
delete from nhan_vien 
where luong < 50  ;

delete from nhan_vien 
where 
datediff date_part('month',ngay_sinh) = date_part('month',now());

delete from nhan_vien 
where ((DATE_PART('year', '2012-01-01'::date) - DATE_PART('year', '2011-10-02'::date)) * 12 +
        (DATE_PART('month', '2012-01-01'::date) - DATE_PART('month', '2011-10-02'::date))) < 2;
-- 4.Lấy ra tổng tiền mỗi tháng sếp phải trả cho nhân viên. (*: theo từng nghề)
select sum(luong) from nhan_vien;

select job , sum(luong) as tong_luong from nhan_vien
group by(job);
-- 5.Lấy ra trung bình lương nhân viên. (*: theo từng nghề)
select ROUND(avg(luong),2) from nhan_vien;

select job , ROUND(avg(luong),2) as trung_binh_luong from nhan_vien
group by(job);
-- 6.(*) Lấy ra các bạn mới vào làm hôm nay
select *from nhan_vien 
where current_date = day_start;
-- 7.(*) Lấy ra 3 bạn nhân viên cũ nhất
select  *from nhan_vien 
order by day_start asc limit 3;

select  *from nhan_vien 
order by day_start asc 
offset 3 rows 
fetch next 1 rows only;

-- 8.(**) Tách những thông tin trên thành nhiều bảng cho dễ quản lý, lương 1 nhân viên có thể nhập nhiều lần
select ho_ten,gender,sum(luong) from nhan_vien 
group by(ho_ten,gender);


where (DATE_PART('year', '2012-01-01'::date) - DATE_PART('year', '2011-10-02'::date)) * 12 +
        (DATE_PART('month', '2012-01-01'::date) - DATE_PART('month', '2011-10-02'::date));








