DROP DATABASE IF EXISTS php_db;

CREATE DATABASE php_db;

USE php_db;

CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(30) NOT NULL ,
    username VARCHAR(30) NOT NULL ,
    password VARCHAR(30) NOT NULL
);

CREATE TABLE Hashtags (
    id SERIAL PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

CREATE TABLE Topics (
    id SERIAL PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT
);

CREATE TABLE Channels (
    id SERIAL PRIMARY KEY,
    name VARCHAR(30) NOT NULL ,
    description TEXT,
    trusted BOOl DEFAULT false,
    owner BIGINT UNSIGNED,
    FOREIGN KEY (owner) REFERENCES Users (id) ON DELETE CASCADE
);

CREATE TABLE Messages (
    id SERIAL PRIMARY KEY,
    body TEXT NOT NULL ,
    dispatch_time DATETIME NOT NULL,
    private BOOL,
    hashtag BIGINT UNSIGNED,
    owner BIGINT UNSIGNED,
    channel BIGINT UNSIGNED,
    FOREIGN KEY (hashtag) REFERENCES Hashtags(id) ON DELETE CASCADE,
    FOREIGN KEY (owner) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (channel) REFERENCES Channels(id) ON DELETE CASCADE
);

CREATE TABLE TopicHashtags (
    id SERIAL PRIMARY KEY,
    hashtag BIGINT UNSIGNED,
    topic BIGINT UNSIGNED,
    FOREIGN KEY (hashtag) REFERENCES Hashtags(id) ON DELETE CASCADE,
    FOREIGN KEY (topic) REFERENCES Topics(id) ON DELETE CASCADE
);


