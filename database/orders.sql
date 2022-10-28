drop table if exists orders;
create table orders
(
  id INT NOT NULL AUTO_INCREMENT,
  uid INT NOT NULL,
  food_store_id INT NOT NULL,
  total FLOAT(6, 2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  collection_point VARCHAR(100),
  collection_time VARCHAR(100),
  PRIMARY KEY (id),
  FOREIGN KEY (store_id) REFERENCES food_stores(id)
);