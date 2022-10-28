drop table if exists collection_points;
create table collection_points
(
  id INT NOT NULL AUTO_INCREMENT,
  name varchar(100) null,
  PRIMARY KEY (id)
);

INSERT INTO collection_points (name) VALUES
("Graduate Hall 1 (Lobby 2 entrance)"),
("NTU North Spine (Level 1 near LT19A)"),
("NTU South Spine – S2-B3 (Carpark B, near EEE S2 entrance)"),
("Student Service Centre (Near entrance lobby)"),
("NTU Research Techno Plaza (At the counter)"),
("North Hill (FoodFrog Cabinet on the right to the food court entrance)"),
("Nanyang Graduate Hall 2 (Near Level 3 entrance)"),
("Tamarind Hall (FoodFrog Cabinet near cREate@Saraca Hall)"),
("Hall 14 (Drinks stall inside Canteen 14)"),
("Hall 3/Hall 12 (Between block 60 and 64)"),
("Hall 8 (Near hall admin office)"),
("Hall 9 (Canteen 9 front door)"),
("17B, Pioneer Hall (17B Vending Machine Room, beside Cultural Room 1)"),
("Hall 4 (FoodFrog Cabinet near entrance of Blk 26)"),
("Hall 5 (Hall 5 Bike Park with vending machine)"),
("Hall 13 (Near Function Hall)"),
("Hall 6 (Near drop off point)"),
("Hall 11 (Outside Canteen 11)");
