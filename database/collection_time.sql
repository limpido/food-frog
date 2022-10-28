drop table if exists collection_time;
create table collection_time
(
  id INT NOT NULL AUTO_INCREMENT,
  time varchar(100) null,
  PRIMARY KEY (id)
);

INSERT INTO collection_time (time) VALUES
("Lunch (12:00 – 13:00)"),
("Dinner (18:00 – 19:00)");
