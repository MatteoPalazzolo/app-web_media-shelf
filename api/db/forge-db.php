<?php
require 'init-db-connection.php';

// create media table if not exists
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS media (
        id                  INT             AUTO_INCREMENT PRIMARY KEY,
        m_title             VARCHAR(255)    NOT NULL,
        m_year              INT             NOT NULL,
        m_rating            INT             NOT NULL,
        m_type ENUM('Movie', 'Videogame', 'Anime', 'Cartoon', 'TV Series', 'Book', 'Manga') NOT NULL,
        m_img_data          MEDIUMBLOB      NOT NULL,
        m_color_one         VARCHAR(7)      NOT NULL,
        m_color_two         VARCHAR(7)      NOT NULL,
        m_color_three       VARCHAR(7)      NOT NULL,
        m_active            TINYINT         NOT NULL,
        UNIQUE (m_title)
    )");
    $pdo->exec("CREATE TABLE IF NOT EXISTS tags (
        id                  INT             AUTO_INCREMENT PRIMARY KEY,
        t_name              VARCHAR(255)    NOT NULL,
        t_description       TEXT            NOT NULL,
        UNIQUE (t_name)
    )");
    $pdo->exec("CREATE TABLE IF NOT EXISTS media_tags (
        id_media            INT             NOT NULL,
        id_tag              INT             NOT NULL,
        FOREIGN KEY (id_media) REFERENCES media(id),
        FOREIGN KEY (id_tag)   REFERENCES tags(id),
        PRIMARY KEY (id_media, id_tag)
    )");
    
} catch (PDOException $e) {
    die("\nERROR: forge-db.php falied: " . $e->getMessage());
}

function insertMedia($pdo, $title, $year, $rating, $type, $imgUrl, $colorTwo, $colorThree) {
    try {
        // Check if the title already exists
        $checkSql = "SELECT COUNT(*) FROM media WHERE m_title = :m_title";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute([':m_title' => $title]);
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            return;
        }

        // Prepare the SQL statement
        $sql = "INSERT INTO media (m_title, m_year, m_rating, m_type, m_img_data, m_color_one, m_color_two, m_color_three, m_active) 
                VALUES (:m_title, :m_year, :m_rating, :m_type, :m_img_data, :m_color_one, :m_color_two, :m_color_three, :m_active)";
        $stmt = $pdo->prepare($sql);

        // Get image data
        $imgData = file_get_contents($imgUrl);

        // Execute the statement
        $stmt->execute([
            ':m_title' => $title,
            ':m_year' => $year,
            ':m_rating' => $rating,
            ':m_type' => $type,
            ':m_img_data' => $imgData,
            ':m_color_one' => $colorTwo, //NOTICE
            ':m_color_two' => $colorTwo,
            ':m_color_three' => $colorThree,
            ':m_active' => 1
        ]);
    } catch (PDOException $e) {
        die("\nERROR: Could not insert record for '$title'. " . $e->getMessage());
    }
}

insertMedia($pdo, 'Citizen Kane', 1942, 4, 'Movie', 'https://flxt.tmsimg.com/assets/p1485_p_v8_aa.jpg', '#1A5058', '#E9490B');
insertMedia($pdo, 'Casablanca', 1942, 4, 'Movie', 'https://cdn11.bigcommerce.com/s-j3ptcnmq25/images/stencil/2560w/products/1883/3416/51cNCX-dOkL__89126__03005.1627579337.jpg', '#4E4441', '#E9DFDA');
insertMedia($pdo, 'Dark Souls 1', 2011, 5, 'Videogame', 'https://m.media-amazon.com/images/M/MV5BYTk4YmExZGUtZWIyYy00MzRjLWIzMzYtYmRmOGUyOWIxNjU1XkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg', '#28829C', '#E0F1F7');
insertMedia($pdo, 'Cowboy Bebop', 1998, 5, 'Anime', 'https://www.themoviedb.org/t/p/original/7zcIgfFGtHGyvS9tQhCFmjoMu14.jpg', '#CB2C16', '#CC548C');
insertMedia($pdo, 'Evangelion', 1995, 5, 'Anime', 'https://m.media-amazon.com/images/M/MV5BMTc4YTY0MDUtYWNmMi00NTRiLWE4NmItM2JiMmIzYmEwNGQzXkEyXkFqcGdeQXVyNTkwNzYyODM@._V1_.jpg', '#4F4669', '#DA3731');
insertMedia($pdo, 'Persona 4 Golden', 2012, 5, 'Videogame', 'https://www.juegostorrentpc.net/wp-content/uploads/2020/07/P4G-Cover.jpg', '#ffa500', '#fff523');
insertMedia($pdo, 'Animal Well', 2024, 5, 'Videogame', 'https://assetsio.reedpopcdn.com/co4hdh.jpg?width=1920&height=1920&fit=bounds&quality=80&format=jpg&auto=webp', '#37356A', '#196157');
insertMedia($pdo, 'Doki Doki Literature Club!', 2017, 4, 'Videogame', 'https://gamefaqs.gamespot.com/a/box/0/0/1/803001_front.jpg', '#7F92CD', '#F8B5E0');
insertMedia($pdo, 'Outer Wilds', 2019, 5, 'Videogame', 'https://assetsio.reedpopcdn.com/co65ac.jpg', '#1B2831', '#F68F26');
insertMedia($pdo, 'Oxenfree', 2016, 5, 'Videogame', 'https://tse1.mm.bing.net/th?id=OIP.u9PoGVjcJh6MDnQrFItdwQHaLK&pid=Api&f=1&ipt=6e7edb1c4d12335c6b3fe135d9245d0a9382c17ee1f96c2ac45c870c30aa5f60&ipo=images', '#763644', '#495973');
insertMedia($pdo, 'Fear & Hunger', 2018, 5, 'Videogame', 'http://www.world-art.ru/games/img/50000/49670/1.jpg', '#372114', '#5B5637');
