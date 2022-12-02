CREATE DATABASE tugas_dac;
CREATE DATABASE tugas_dac_test;

CREATE TABLE users(
    id  INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(55)
)Engine = InnoDB;

CREATE TABLE scores(
                      id  INTEGER PRIMARY KEY AUTO_INCREMENT,
                      user_id INT NOT NULL ,
                      score_total INT NOT NULL DEFAULT 0
)Engine = InnoDB;

alter table scores
    add constraint scores_users_null_fk
        foreign key (user_id) references users (id);

SELECT user.name, score.score_total, score.time_start, score.time_end
FROM scores score
         INNER JOIN users user ON user.id = score.user_id WHERE user_id = ?;

CREATE TABLE pweb(
                      nim  VARCHAR(55) PRIMARY KEY,
                      name VARCHAR(55),
                      presensi INTEGER,
                      tugas INTEGER,
                      uts INTEGER,
                      uas INTEGER
)Engine = InnoDB;