--BUOI 6--
-- Ban lãnh đạo thành phố yêu cầu bạn tạo bảng lưu các con vật trong sở thú
-- Với điều kiện tự bạn quy ước (hãy áp dụng check và default)
drop table if exists dong_vat;
create table dong_vat(
	ma INT  GENERATED BY DEFAULT AS IDENTITY,
	ten varchar(50) not null,
	so_chan INT  not null default 0,
	tuoi_tho INT not null,
	moi_truong_song varchar(50) not null,
	primary key(ma),
	constraint CK_ten check(length(ten) >= 2),
	constraint CK_so_chan check(so_chan < 100 and so_chan >= 0 and so_chan % 2 = 0),
	constraint CK_tuoi_tho check(tuoi_tho > 0)
)
-- Sở thú hiện có 7 con
insert into dong_vat(ten , so_chan , tuoi_tho , moi_truong_song)
values ('cún', 4 , 20 , 'nhà'),
	   ('cá', default , 5 , 'nước'),
	   ('mèo', 4 , 10 , 'nhà') ;
-- Thống kê có bao nhiêu con 4 chân
select count(*) as so_con from dong_vat 
where so_chan = 4 ;
-- Thống kê số con tương ứng với số chân
select count(*) as so_con, so_chan 
from dong_vat 
group by so_chan ;
-- Thống kê số con theo môi trường sống
select moi_truong_song , count(*) as so_con 
from dong_vat 
group by moi_truong_song ;
-- Thống kê tuổi thọ trung bình theo môi trường sống
select moi_truong_song , round(avg(tuoi_tho),2) as tuoi_tho_trung_binh 
from dong_vat 
group by moi_truong_song ;
-- Lấy ra 3 con có tuổi thọ thọ cao nhất
select *from dong_vat 
order by tuoi_tho asc limit 2;

select *from dong_vat 
order by tuoi_tho asc 
offset 1 rows 
fetch next 1 rows only;
--limit offset sql
-- (*) Tách những thông tin trên thành 2 bảng cho dễ quản lý (1 môi trường sống gồm nhiều con)
update dong_vat set moi_truong_song = 'tren cạn'
where moi_truong_song = 'nhà'


---tách bảng---

create table moi_truong_song(
ma int not null GENERATED BY DEFAULT AS IDENTITY,
ten varchar(50) not null ,
primary key(ma)
)
insert into moi_truong_song(ten)
values('trong nhà'),
	  ('ngoài trời');
select *from moi_truong_song;

drop table if exists dong_vat;
create table dong_vat(
	ma INT  GENERATED BY DEFAULT AS IDENTITY,
	ten varchar(50) not null,
	so_chan INT  not null default 0,
	tuoi_tho INT not null,
	ma_moi_truong_song int not null,
	primary key(ma),
	constraint CK_ten check(length(ten) >= 2),
	constraint CK_so_chan check(so_chan < 100 and so_chan >= 0 and so_chan % 2 = 0),
	constraint CK_tuoi_tho check(tuoi_tho > 0),
	foreign key(ma_moi_truong_song) references moi_truong_song(ma)
	
)
insert into dong_vat(ten , so_chan , tuoi_tho , ma_moi_truong_song)
values ('cún', 4 , 20 , 1),
	   ('cá', default , 5 , 2),
	   ('mèo', 4 , 10 , 1) ;

select dong_vat.ma , dong_vat.ten , dong_vat.tuoi_tho,moi_truong_song.ten as ten_moi_truong
from dong_vat
join moi_truong_song 
on moi_truong_song.ma = dong_vat.ma_moi_truong_song;






