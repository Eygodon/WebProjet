create table Im2021_Utilisateurs
(
    pk           INTEGER     not null
        primary key autoincrement,
    identifiant  VARCHAR(30) not null,
    nom          VARCHAR(30) default NULL,
    prenom       VARCHAR(30) default NULL,
    isadmin      INTEGER     default 0 not null,
    anniversaire DATE        default NULL,
    motdepasse   VARCHAR(64) not null
);

create unique index UNIQ_1768BA8DC90409EC
    on Im2021_Utilisateurs (identifiant);

INSERT INTO Im2021_Utilisateurs (pk, identifiant, nom, prenom, isadmin, anniversaire, motdepasse) VALUES (1, 'admin', null, null, 1, null, 'a4cbb2f3933c5016da7e83fd135ab8a48b67bf61');
INSERT INTO Im2021_Utilisateurs (pk, identifiant, nom, prenom, isadmin, anniversaire, motdepasse) VALUES (2, 'gilles', 'Subrenat', 'Gilles', 0, '2000-01-01', 'ab9240da95937a0d51b41773eafc8ccb8e7d58b5');
INSERT INTO Im2021_Utilisateurs (pk, identifiant, nom, prenom, isadmin, anniversaire, motdepasse) VALUES (3, 'rita', 'Zrour', 'Rita', 0, '2001-01-02', '1811ed39aa69fa4da3c457bdf096c1f10cf81a9b');
INSERT INTO Im2021_Utilisateurs (pk, identifiant, nom, prenom, isadmin, anniversaire, motdepasse) VALUES (6, 'Eygodon', 'Berhelot', 'Yann', 0, null, '189240da95937a0d51b457bdf096c1f10cf81a9b');

create table Im2021_Produits
(
    id       INTEGER     not null
        primary key autoincrement,
    libelle  VARCHAR(64) not null,
    prix     INTEGER     not null,
    quantity INTEGER     not null
);

INSERT INTO Im2021_Produits (id, libelle, prix, quantity) VALUES (2, 'fleuret', 30, 54);
INSERT INTO Im2021_Produits (id, libelle, prix, quantity) VALUES (4, 'Cire d''abeille', 20, 9);
INSERT INTO Im2021_Produits (id, libelle, prix, quantity) VALUES (5, 'plante random', 50, 27);
INSERT INTO Im2021_Produits (id, libelle, prix, quantity) VALUES (6, 'Ma bonne foi', 1, 20);
INSERT INTO Im2021_Produits (id, libelle, prix, quantity) VALUES (7, 'Mon amour', 200, 50);

create table Im2021_Panier
(
    id         INTEGER not null
        primary key autoincrement,
    user_pk    INTEGER default NULL
        constraint FK_95FB4B4CACD1671C
            references Im2021_Utilisateurs,
    produit_id INTEGER default NULL
        constraint FK_95FB4B4CF347EFB
            references Im2021_Produits,
    quantite   INTEGER not null
);

create index IDX_95FB4B4CACD1671C
    on Im2021_Panier (user_pk);

create index IDX_95FB4B4CF347EFB
    on Im2021_Panier (produit_id);

-- No source text available
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('table', 'doctrine_migration_versions', 'doctrine_migration_versions', 2, 'CREATE TABLE doctrine_migration_versions (version VARCHAR(191) NOT NULL, executed_at DATETIME DEFAULT NULL, execution_time INTEGER DEFAULT NULL, PRIMARY KEY(version))');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('index', 'sqlite_autoindex_doctrine_migration_versions_1', 'doctrine_migration_versions', 3, null);
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('table', 'sqlite_sequence', 'sqlite_sequence', 5, 'CREATE TABLE sqlite_sequence(name,seq)');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('table', 'Im2021_Utilisateurs', 'Im2021_Utilisateurs', 7, 'CREATE TABLE Im2021_Utilisateurs (pk INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, identifiant VARCHAR(30) NOT NULL COLLATE BINARY --sert de login ( doit être unique)
        , nom VARCHAR(30) DEFAULT NULL COLLATE BINARY, prenom VARCHAR(30) DEFAULT NULL COLLATE BINARY, isadmin INTEGER DEFAULT 0 NOT NULL, anniversaire DATE DEFAULT NULL, motdepasse VARCHAR(64) NOT NULL --mot de passe crypté : il faut une taille assez grande pour ne pas le tronquer
        )');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('index', 'UNIQ_1768BA8DC90409EC', 'Im2021_Utilisateurs', 9, 'CREATE UNIQUE INDEX UNIQ_1768BA8DC90409EC ON Im2021_Utilisateurs (identifiant)');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('table', 'Im2021_Produits', 'Im2021_Produits', 4, 'CREATE TABLE Im2021_Produits (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL COLLATE BINARY, prix INTEGER NOT NULL, quantity INTEGER NOT NULL)');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('table', 'Im2021_Panier', 'Im2021_Panier', 6, 'CREATE TABLE Im2021_Panier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_pk INTEGER DEFAULT NULL, produit_id INTEGER DEFAULT NULL, quantite INTEGER NOT NULL, CONSTRAINT FK_95FB4B4CACD1671C FOREIGN KEY (user_pk) REFERENCES Im2021_Utilisateurs (pk) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_95FB4B4CF347EFB FOREIGN KEY (produit_id) REFERENCES Im2021_Produits (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('index', 'IDX_95FB4B4CACD1671C', 'Im2021_Panier', 10, 'CREATE INDEX IDX_95FB4B4CACD1671C ON Im2021_Panier (user_pk)');
INSERT INTO sqlite_master (type, name, tbl_name, rootpage, sql) VALUES ('index', 'IDX_95FB4B4CF347EFB', 'Im2021_Panier', 11, 'CREATE INDEX IDX_95FB4B4CF347EFB ON Im2021_Panier (produit_id)');

-- No source text available
INSERT INTO sqlite_sequence (name, seq) VALUES ('Im2021_Utilisateurs', 6);
INSERT INTO sqlite_sequence (name, seq) VALUES ('Im2021_Produits', 7);
INSERT INTO sqlite_sequence (name, seq) VALUES ('Im2021_Panier', 12);