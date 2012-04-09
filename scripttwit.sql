create database mini_twit;

use mini_twit

create table users (name char(20) primary key,
pass char(32) not null
);

create table comments (
	id int(3) primary key auto_increment not null,
	name char(20) not null,
	u_comment text not null,
	fecha date,
foreign key (name) references users(name) on delete cascade
);
