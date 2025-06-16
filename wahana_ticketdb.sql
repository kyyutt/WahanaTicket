-- Database: wahana_ticketdb

DROP TABLE IF EXISTS sales;

DROP TABLE IF EXISTS tickets;

DROP TABLE IF EXISTS users;

-- Table users
CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    role enum('admin', 'kasir') NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO
    users
VALUES (
        1,
        'admin',
        '$2y$10$nZp0ilkXO723.hYt73LKQOaeVuvQikiyYpIjc8MVUAgfBH3PksTtO',
        'admin',
        '2025-06-13 08:04:43'
    ),
    (
        2,
        'Kasir2',
        '$2y$10$Ixj8Ti83oGs9E2NJ1dEkeOwYAqCoqtjZgmXMYgy2YTferHmVl5PuW',
        'kasir',
        '2025-06-13 09:05:43'
    ),
    (
        4,
        'Kasir1',
        '$2y$10$hbh4FniQpA4raI.9nk5.9OI2LrlH4DuEhiF6jo8F9a8WGSlqPzq1a',
        'kasir',
        '2025-06-13 21:58:58'
    ),
    (
        5,
        'Kasir3',
        '$2y$10$LE6jq/Zt5wpl7NpDgS533Oh9VfEuIpJnArcN21kIPjS.RRvWboo9C',
        'kasir',
        '2025-06-13 22:28:28'
    );

-- Table tickets
CREATE TABLE tickets (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    price decimal(10, 2) NOT NULL,
    stock int NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO
    tickets
VALUES (
        2,
        'sdf',
        132331.00,
        3,
        '2025-06-13 15:52:36',
        '2025-06-13 22:06:11'
    ),
    (
        4,
        'Anak anak',
        15000.00,
        88,
        '2025-06-13 22:28:00',
        '2025-06-13 22:29:09'
    );

-- Table sales
CREATE TABLE sales (
    id int NOT NULL AUTO_INCREMENT,
    ticket_id int NOT NULL,
    user_id int NOT NULL,
    quantity int NOT NULL,
    total_price decimal(10, 2) NOT NULL,
    sold_at datetime DEFAULT CURRENT_TIMESTAMP,
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (ticket_id) REFERENCES tickets (id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO
    sales
VALUES (
        2,
        2,
        2,
        1,
        132331.00,
        '2025-06-13 17:42:30',
        '2025-06-13 18:41:39'
    ),
    (
        3,
        2,
        2,
        3,
        396993.00,
        '2025-06-13 18:06:10',
        '2025-06-13 18:41:39'
    ),
    (
        4,
        2,
        2,
        1,
        132331.00,
        '2025-06-13 18:34:12',
        '2025-06-13 18:41:39'
    ),
    (
        5,
        2,
        2,
        1,
        132331.00,
        '2025-06-13 18:36:46',
        '2025-06-13 18:41:39'
    ),
    (
        6,
        2,
        4,
        2,
        264662.00,
        '2025-06-13 22:05:35',
        '2025-06-13 13:05:35'
    ),
    (
        7,
        2,
        2,
        1,
        132331.00,
        '2025-06-13 22:06:11',
        '2025-06-13 13:06:11'
    ),
    (
        8,
        4,
        4,
        2,
        30000.00,
        '2025-06-13 22:29:09',
        '2025-06-13 13:29:09'
    );