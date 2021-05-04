-- USE chain_reaction;

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
    correct INT NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS owns (
    chain_id VARCHAR(10) NOT NULL,
    player_id VARCHAR(10) NOT NULL,
    FOREIGN KEY (chain_id) REFERENCES chain(chain_id),
    FOREIGN KEY (player_id) REFERENCES player(player_id)
);

CREATE TABLE IF NOT EXISTS game (
    game_id VARCHAR(10) NOT NULL PRIMARY KEY,
    owner_id VARCHAR(10) NOT NULL,
    display_name VARCHAR (255) NOT NULL,
    chain_id VARCHAR(10) NOT NULL,
    gameStatus VARCHAR(50) NOT NULL,
    time INTEGER NOT NULL,
    cooldown INTEGER NOT NULL,
    start INTEGER NOT NULL,
    FOREIGN KEY (chain_id) REFERENCES chain(chain_id)
);

CREATE TABLE IF NOT EXISTS playing (
    game_id VARCHAR(10) NOT NULL,
    player_id VARCHAR(10) NOT NULL,
    display_name VARCHAR(255) NOT NULL,
    payout VARCHAR(5) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES game(game_id)
);

CREATE TABLE IF NOT EXISTS history (
    game_id VARCHAR(10) NOT NULL,
    player_id VARCHAR(10) NOT NULL,
    display_name VARCHAR(255) NOT NULL,
    payout VARCHAR(5) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES game(game_id),
    FOREIGN KEY (player_id) REFERENCES player(player_id)
);