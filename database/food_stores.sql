drop table if exists food_stores;
create table food_stores
(
  id int not null AUTO_INCREMENT,
  name char(50) not null,
  image char(50) not null,
  cuisine_type char(50) default 0,
  primary key (id)
);

INSERT INTO food_stores (id, name, image, cuisine_type) values 
  (1, "Cha Cha Tacos", "media/foodplaces/mexican_food.jpeg", "Mexican"),
  (2, "Sizzling Indian", "media/foodplaces/indian_food.jpg", "Indian"),
  (3, "Yellow Table", "media/foodplaces/chinese_food.jpg", "Chinese"),
  (4, "Grizzly Ranch", "media/foodplaces/western_food.jpg", "Western")
  
