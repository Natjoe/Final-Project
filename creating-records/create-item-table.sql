 create table items(id int(5) NOT NULL AUTO_INCREMENT,
 name varchar(45) not null,
 description TEXT,
 unique key id(id),
 created_on timestamp DEFAULT CURRENT_TIMESTAMP
 updated_on timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)