USE DATABASE db;

CREATE TABLE IF NOT EXISTS chain (
    chain_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    word1 VARCHAR(255) NOT NULL,
    word2 VARCHAR(255) NOT NULL,
    word3 VARCHAR(255) NOT NULL,
    word4 VARCHAR(255) NOT NULL,
    word5 VARCHAR(255) NOT NULL,
    word6 VARCHAR(255) NOT NULL,
    word7 VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS player (
    player_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email VARCHAR(255) NOT NULL,
    encrypted_pwd VARCHAR(255) NOT NULL,
    earnings INT NOT NULL,
    gussess INT NOT NULL,
    correct INT NOT NULL
);

CREATE TABLE IF NOT EXISTS owns (
    chain_id INT NOT NULL,
    player_id INT NOT NULL,
    FOREIGN KEY (chain_id) REFERENCES chain(chain_id),
    FOREIGN KEY (player_id) REFERENCES player(player_id)
);

CREATE TABLE IF NOT EXISTS game (
    game_id VARCHAR(255) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS playing (
    player_id INT NOT NULL,
    game_id INT NOT NULL,
    team INT NOT NULL
);