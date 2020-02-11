CREATE DATABASE wiitheure;

USE wiitheure;

CREATE TABLE user (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    username varchar(20) NOT NULL,
    password varchar(255) NOT NULL,
    mail varchar(255) UNIQUE NOT NULL,
    bio text,
    create_at timestamp NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY(id)
);

CREATE TABLE post (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    citation int,
    content text,
    create_at timestamp NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (citation) REFERENCES post(id)
);

CREATE TABLE comment (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    post_id int NOT NULL,
    user_id int NOT NULL,
    comment_id int,
    content text,
    create_at timestamp NOT NULL DEFAULT current_timestamp,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (post_id) REFERENCES post(id),
    FOREIGN KEY (comment_id) REFERENCES comment(id)
);

CREATE TABLE follow (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    followed int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (followed) REFERENCES user(id),
    PRIMARY KEY(id)
);
#select user.id, followed, content from user inner join follow on follow.user_id = user.id inner join post on post.user_id = follow.followed;

CREATE TABLE tag (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    tag varchar(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE tagtopost (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    post_id int NOT NULL,
    tag_id int NOT NULL,
    FOREIGN KEY (tag_id) REFERENCES tag(id),
    FOREIGN KEY (post_id) REFERENCES post(id),
    PRIMARY KEY(id)
);

CREATE TABLE rw (
    id int UNIQUE NOT NULL AUTO_INCREMENT,
    post_id int NOT NULL,
    user_id int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (post_id) REFERENCES post(id),
    PRIMARY KEY(id)
);