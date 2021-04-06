USE chain_reaction;

-- to ease development, will need to be removed later;
-- SET FOREIGN_KEY_CHECKS = 0;
-- DROP TABLE chain;
-- DROP TABLE player;
-- DROP TABLE owns;
-- DROP TABLE game;
-- DROP TABLE player;
-- SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS chain (
    chain_id VARCHAR(10) PRIMARY KEY NOT NULL,
    word1 VARCHAR(255) NOT NULL,
    word2 VARCHAR(255) NOT NULL,
    word3 VARCHAR(255) NOT NULL,
    word4 VARCHAR(255) NOT NULL,
    word5 VARCHAR(255) NOT NULL,
    word6 VARCHAR(255) NOT NULL,
    word7 VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS player (
    player_id VARCHAR(10) PRIMARY KEY NOT NULL,
    email VARCHAR(255) NOT NULL,
    encrypted_pwd VARCHAR(255) NOT NULL,
    earnings INT NOT NULL,
    guesses INT NOT NULL,
    correct INT NOT NULL
);

CREATE TABLE IF NOT EXISTS owns (
    chain_id VARCHAR(10) NOT NULL,
    player_id VARCHAR(10) NOT NULL,
    FOREIGN KEY (chain_id) REFERENCES chain(chain_id),
    FOREIGN KEY (player_id) REFERENCES player(player_id)
);

CREATE TABLE IF NOT EXISTS game (
    game_id VARCHAR(10) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS playing (
    player_id VARCHAR(10) NOT NULL,
    game_id VARCHAR(10) NOT NULL,
    team VARCHAR(10) NOT NULL
);