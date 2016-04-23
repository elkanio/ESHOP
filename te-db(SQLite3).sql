-- Adminer 4.0.2 SQLite 3 dump

CREATE TABLE objednavky(
id integer primary key autoincrement,
jmeno varchar(80) not null,
prijmeni varchar(80) not null,
platba varchar(5) not null,
doprava varchar(5) not null,
produkty varchar(255) not null,
cena integer not null, mesto varchar(50));


CREATE TABLE "produkty" (
  "id" integer NULL PRIMARY KEY AUTOINCREMENT,
  "nazev" text NOT NULL,
  "popis" text NULL,
  "kategorie" text NOT NULL,
  "cena" integer NOT NULL
);

INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (1,	'Yamaha YAS-280',	NULL,	'Saxofony',	25000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (2,	'Yamaha YTS-475',	NULL,	'Saxofony',	40000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (3,	'Vytěrák na alt-sax',	NULL,	'Prislusenstvi',	500);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (4,	'Vytěrák na tenor-sax',	NULL,	'Prislusenstvi',	500);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (5,	'Věšurek',	NULL,	'Prislusenstvi',	350);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (6,	'Keilwerth SX90R',	'Keilwerth SX90R Professional Alto Saxophone',	'Saxofony',	5000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (7,	'Yamaha YAS-875EX',	NULL,	'Saxofony',	80000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (8,	'P. Mauriat Gold Lacquer',	NULL,	'Saxofony',	45000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (9,	'Buffet 400 Series Matte',	NULL,	'Saxofony',	90000);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (10,	'Metal Berg Larsen Jazz Tenor',	'Nejlepší kovová hubička na trhu.',	'Prislusenstvi',	2500);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (11,	'Stojan na saxofon HERCULES',	'Jak pro alt, tak i pro tenor saxofon ',	'Prislusenstvi',	450);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (12,	'Vandoren Classic Alt Reeds',	'Tvrdost: 2',	'Platky',	60);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (13,	'Rico Plasticover Alto',	'Tvrdost: 2.5',	'Platky',	80);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (14,	'Forestone Synthetic Tenor',	'Novinka na trhu',	'Platky',	150);
INSERT INTO "produkty" ("id", "nazev", "popis", "kategorie", "cena") VALUES (15,	'SKB SKB-440 Alto Sax. ',	'',	'Prislusenstvi',	2500);

INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('produkty',	'15');
INSERT INTO "sqlite_sequence" ("name", "seq") VALUES ('objednavky',	'30');

-- 
