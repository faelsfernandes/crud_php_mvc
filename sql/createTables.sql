CREATE TABLE Authors (
    authorid int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    lastname varchar(255),
    PRIMARY KEY (authorid)
);

CREATE TABLE Books (
    bookid int NOT NULL AUTO_INCREMENT,
    title varchar (255) NOT NULL,
    quantity int NOT NULL,
    authorid int,
    PRIMARY KEY (bookid),
    FOREIGN KEY (authorid) REFERENCES Authors(authorid)
);

