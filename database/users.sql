drop table if exists users;
create table if not exists users
(
  id int not null AUTO_INCREMENT,
  username char(20) not null,
  email char(100) not null,
  password char(32) not null,
  phone int,
  primary key (id)
);