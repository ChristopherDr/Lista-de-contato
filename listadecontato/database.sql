
ALTER DATABASE epiz_XXX_dbname CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE users;
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE contacts;
CREATE TABLE contacts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(24) NOT NULL UNIQUE,
    number VARCHAR(24) NOT NULL,
    user_id INT NOT NULL ,
    FOREIGN KEY (`user_id`) REFERENCES users (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;