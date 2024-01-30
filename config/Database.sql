-- Buat database ereport_new
create database ereport_new;
use ereport_new;

-- buat table users
create table users (
	id int(11) not null auto_increment,
	nama_lengkap varchar(255) not null,
	jabatan varchar(255) not null,
	username varchar(255) not null,
	password varchar(255) not null,
	level varchar(255) not null,
	blokir varchar(255) not null,
	primary key(id)
)engine=innoDB;

-- lihat table users
select * from users;