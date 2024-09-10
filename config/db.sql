-- Create the users table
CREATE TABLE users (
    uid VARCHAR(255) PRIMARY KEY,
    role VARCHAR(50),
    lastName VARCHAR(255),
    firstName VARCHAR(255),
    middleName VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

-- Create the representatives table with uid as a foreign keys
CREATE TABLE representatives (
    uid VARCHAR(255),
    FOREIGN KEY (uid) REFERENCES users(uid)
);
