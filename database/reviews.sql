drop table if exists reviews;
create table if not exists reviews
(
  id int not null AUTO_INCREMENT,
  food_store_id INT NOT NULL,
  username char(20) not null,
  content TEXT(500) not null,
  rating int not null,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (food_store_id) REFERENCES food_stores(id)
);

INSERT INTO reviews (food_store_id, username, rating, content, created_at) VALUES 
  (1, 'helloworld', 4, "Fantastic", "2022-10-29 00:13:36"),
  (1, 'ryantan', 4, "The meat is tender", "2022-10-29 00:13:36"),
  (1, 'francis', 5, "Tacos are really tasty", "2022-10-29 00:13:36"),
  (1, 'michael', 4, "Beef is a bit tough, would buy again", "2022-10-29 00:13:36"),
  (1, 'brendan', 5, "Perfect cheese pull, will definitely buy again", "2022-10-29 00:13:36"),
  (1, 'Ryan', 3, "Beef is a bit tough", "2022-10-29 00:13:36"),
  (1, 'Grace', 5, "Perfect starterss, great sharing food", "2022-10-28 12:13:36"),
  (1, 'Evan', 3, "Great guac", "2022-10-29 00:13:15"),
  (1, 'Michelle', 4, "Tasty, enjoy it", "2022-10-29 00:13:36"),
  (1, 'Tom', 4, "Meat is a bit tough otherwise really tasty", "2022-10-29 00:13:36"),
  (1, 'Harry', 3, "Could have been softer, Chocolate sauce was divine", "2022-10-29 00:13:36"),
  (1, 'Carmen', 5, "Best tres leches ever, enjoyed every bite, tasted almost like the one I tried in Mexico", "2022-10-29 00:13:36"),
  (1, 'Rachel', 5, "Refreshing for the weather", "2022-10-29 00:13:36"),
  (2, 'Trent', 3, "Great but a bit too oily for my taste", "2022-10-29 00:13:36"),
  (2, 'Ian', 5, "Tasty, best naan I have had in a bit", "2022-10-29 00:13:36"),
  (2, 'Gerald', 4, "Loved the taste, great to try with the gravy", "2022-10-29 00:13:36"),
  (2, 'Shaza', 5, "Super crispy and tasty, very yummy", "2022-10-29 00:13:36"),
  (2, 'Tania', 5, "Soft and well marinated, great sharing food", "2022-10-29 00:13:36"),
  (2, 'Shannon', 5, "Loved the masala, the chicken was perfect, really worth the price", "2022-10-29 00:13:36"),
  (2, 'Zoey', 5, "Well-cooked, enjoyed the meal", "2022-10-29 00:13:36"),
  (2, 'Tiara', 4, "Cooling and interesting flavour", "2022-10-29 00:13:36"),
  (2, 'Jolene', 4, "Exotic, enjoyed every bite", "2022-10-29 00:13:36"),
  (2, 'Joey', 3, "A different drink", "2022-10-29 00:13:36"),
  (2, 'Una', 5, "Hits all the right notes, loved every sip", "2022-10-29 00:13:36"),
  (2, 'Lloyd', 5, "The perfect drink after a long day", "2022-10-29 00:13:36"),
  (3, 'Will', 3, "Just a normal fried rice, nothing special", "2022-10-29 00:13:36"),
  (3, 'Vio', 5, "Fish tasted really fresh, soup was very flavourful", "2022-10-29 00:13:36"),
  (3, 'Shri', 5, "Loved the filling", "2022-10-29 00:13:36"),
  (4, 'Shrilekha', 5, "Tasty, gravy was nice", "2022-10-29 00:13:36"),
  (4, 'Emelda', 3, "Chicken was dry", "2022-10-29 00:13:36"),
  (4, 'Jacelyn', 4, "Perfect carbonara, just the right amount of everything", "2022-10-29 00:13:36"),
  (4, 'Soren', 5, "Perfect for a rainy weather", "2022-10-29 00:13:36"),
  (4, 'Nitya', 5, "Generous with portion. Gave free garlic bread as well", "2022-10-29 00:13:36");
  