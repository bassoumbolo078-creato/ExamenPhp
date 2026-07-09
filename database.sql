-- Active: 1780854912960@@127.0.0.1@5432@exam
create database exam;
DROP TABLE IF EXISTS reservations;
DROP TYPE IF EXISTS type_chambre_enum;
DROP TYPE IF EXISTS statut_enum;

-- Création des types ENUM
CREATE TYPE type_chambre_enum AS ENUM (
    'STANDARD',
    'CONFORT',
    'SUITE'
);

CREATE TYPE statut_enum AS ENUM (
    'VALIDEE',
    'ANNULEE'
);

-- Création de la table
CREATE TABLE reservations (
    id SERIAL PRIMARY KEY,
    nom_client VARCHAR(100) NOT NULL,
    numero_chambre INTEGER NOT NULL,
    nombre_nuits INTEGER NOT NULL,
    type_chambre type_chambre_enum NOT NULL,
    statut statut_enum NOT NULL DEFAULT 'VALIDEE',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Données de test
INSERT INTO reservations (
    nom_client,
    numero_chambre,
    nombre_nuits,
    type_chambre,
    statut
) VALUES
('Amadou Diallo', 101, 3, 'STANDARD', 'VALIDEE'),
('Fatou Sow', 205, 7, 'SUITE', 'VALIDEE'),
('Moussa Ndiaye', 310, 2, 'CONFORT', 'ANNULEE'),
('Aissatou Ba', 102, 5, 'CONFORT', 'VALIDEE');
SELECT * FROM reservations;
SELECT current_database();
SELECT tablename
FROM pg_tables
WHERE schemaname = 'public';
