CREATE TABLE colors(
    id serial PRIMARY key,
    name VARCHAR(30) UNIQUE NOT NULL     
);

ALTER TABLE models
DROP COLUMN is_hatchback;

ALTER TABLE makes
RENAME COLUMN "is_domstic" TO "is_domestic";