CREATE TABLE task (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(100) NOT NULL,
    descriptionn VARCHAR(100) NOT NULL,
    statuss VARCHAR(100) NOT NULL,
    creation_date DATE DEFAULT (DATE('now')) NOT NULL
);

INSERT INTO task (title,descriptionn,statuss) VALUES ('Office Meeting', 'About profit','pendente');
INSERT INTO task (title,descriptionn,statuss) VALUES ('Office Meeting', 'About investment','in progress');
INSERT INTO task (title,descriptionn,statuss) VALUES ('Online Meeting', 'About new partners','completed');