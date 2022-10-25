drop table if exists food_items;
create table food_items
(
  id int NOT NULL AUTO_INCREMENT,
  food_store_id INT NOT NULL,
  name char(50) null,
  image char(50) default null,
  food_category char(50) default 0,
  is_best_seller BOOL default 0,
  price float(6, 2) default 0,
  primary key (id),
  FOREIGN KEY (food_store_id) REFERENCES food_stores(id)
);


INSERT INTO food_items (food_store_id, name, image, food_category, is_best_seller, price) VALUES 
  (1, "Chicken Tacos", "media/mexican/chicken_tacos.jpg" , "Main", 0, 7.00),
  (1, "Beef Tacos", "media/mexican/beef_tacos.jpg" , "Main", 1, 7.00),
  (1, "Chicken Quesdilla", "media/mexican/chicken_quesdilla.jpg" , "Main", 1, 7.00),
  (1, "Beef Quesdilla", "media/mexican/beef_quesdilla.jpg" , "Main", 0, 7.00),
  (1, "Loaded Nachos", "media/mexican/loaded_nachos.jpg" , "Starter", 1, 5.00),
  (1, "Guacamole & Chips", "media/mexican/guacandchips.jpg", "Starter", 0, 5.00),
  (1, "Chicken Enchiladas", "media/mexican/chicken_enchiladas.jpg", "Main", 1, 7.00),
  (1, "Beef Enchiladas", "media/mexican/beef_enchiladas.jpg" , "Main", 0, 7.00),
  (1, "Churros", "media/mexican/churros.jpg" , "Dessert", 0, 6.00),
  (1, "Tres Leches", "media/mexican/tres_leches.jpg", "Dessert", 1, 6.00),
  (1, "Bottled Water", "media/mexican/bottled_water.jpg", "Beverages", 0, 1.50),
  (1, "Ice Lemon Tea", "media/mexican/ice_lemon_tea.jpg", "Beverages", 1, 2.00),
  (1, "Freshly-Squeezed Orange Juice", "media/mexican/orange_juice.jpg" , "Beverages", 1, 2.50),
  (1, "Freshly-Squeezed Lime Juice",  "media/mexican/lime_juice.jpg" , "Beverages", 0, 2.50),

  (2, "Ghee Rice", "media/indian/ghee_rice.jpg" , "Main", 0, 3.00),
  (2, "Naan", "media/indian/naan.jpg" , "Main", 1, 2.50),
  (2, "Briyani Rice", "media/indian/briyani_rice.jpg" , "Main", 0, 3.00),
  (2, "Prata", "media/indian/prata.jpg" , "Main", 1, 3.00),
  (2, "Chicken Tikka", "media/indian/chicken_tikka.jpg" , "Starter", 1, 5.00),
  (2, "Veg Pakora", "media/indian/veg_pakora.jpg" , "Starter", 0, 5.00),
  (2, "Butter Chicken", "media/indian/butter_chicken.jpg", "Main", 1, 7.00),
  (2, "Panner Butter Masala", "media/indian/panner_butter_masala.jpg" , "Main", 1, 7.00),
  (2, "Kulfi", "media/indian/kulfi.jpg" , "Dessert", 0, 2.00),
  (2, "Gulab Jamun", "media/indian/gulab_jamun.jpg" , "Dessert", 1, 2.00),
  (2, "Lassi", "media/indian/lassi.jpg" , "Beverages", 0, 2.50),
  (2, "Mango Lassi", "media/indian/mango_lassi.jpg", "Beverages", 1, 3.00),
  (2, "Masala Tea", "media/indian/masala_tea.jpg" , "Beverages", 1, 1.80),
  (2, "Filter Coffee",  "media/indian/filter_coffee.jpg" , "Beverages", 0, 1.80),
  
  (3, "Egg Fried Rice", "media/chinese/egg_fried_rice.jpg" , "Main", 1, 5.00),
  (3, "Fish Soup", "media/chinese/fish_soup.jpg" , "Main", 1, 6.50),
  (3, "Char Kuey Teow", "media/chinese/kuey_teow.jpg" , "Main", 0, 5.00),
  (3, "Peanut Ball Soup", "media/chinese/peanut_ball_soup.jpg" , "Dessert", 1, 2.00),
  (3, "Herbal Tea", "media/chinese/herbal_tea.jpg", "Beverages", 0, 2.00),

  (4, "Chicken Chop", "media/western/chicken_chop.jpg" , "Main", 1, 5.00),
  (4, "Chicken Cutlet", "media/western/chicken_cutlet.jpg" , "Main", 0, 6.50),
  (4, "Carbonara", "media/western/carbonara.jpg" , "Main", 0, 5.00),
  (4, "Creamy Mushroom Soup", "media/western/soup.jpg" , "Starter", 1, 6.50),
  (4, "Cheesy Mayo Fries", "media/western/fries.jpg" , "Starter", 1, 5.00);
  

  
  
  
 