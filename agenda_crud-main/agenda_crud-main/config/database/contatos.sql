CREATE TABLE eleitores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(15),
    endereco VARCHAR(255),
    cidade VARCHAR(100),
    estado VARCHAR(2),
    numero_titulo VARCHAR(20) UNIQUE,
    zona_eleitoral VARCHAR(10),
    secao_eleitoral VARCHAR(10),
    data_nascimento DATE,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
