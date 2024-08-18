<?php
require 'init-db-connection.php';

// create media table if not exists
try {
    $sql = "CREATE TABLE IF NOT EXISTS media (
                id INT AUTO_INCREMENT PRIMARY KEY,
                m_title VARCHAR(255) NOT NULL,
                m_year INT NOT NULL,
                m_rating INT NOT NULL,
                m_type ENUM('Movie', 'Videogame', 'Anime', 'Cartoon', 'TV Series', 'Book', 'Manga', 'Other') NOT NULL,
                m_img_data LONGBLOB NOT NULL,
                m_color_two VARCHAR(7) NOT NULL,
                m_color_three VARCHAR(7) NOT NULL,
                UNIQUE (m_title)
            )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("\nERROR: init-db.php falied: " . $e->getMessage());
}

// populate media table with some data
try {
    $sql = "INSERT IGNORE INTO media (m_title, m_year, m_rating, m_type, m_img_data, m_color_two, m_color_three) 
            VALUES (:m_title, :m_year, :m_rating, :m_type, :m_img_data, :m_color_two, :m_color_three)";
    $stmt = $pdo->prepare($sql);

    // Insert Citizen Kane
    $stmt->execute([
        'm_title' => 'Citizen Kane',
        'm_year' => 1942,
        'm_rating' => 4,
        'm_type' => 'Movie',
        'm_img_data' => file_get_contents('https://flxt.tmsimg.com/assets/p1485_p_v8_aa.jpg'),
        'm_color_two' => '#1A5058',
        'm_color_three' => '#E9490B',
    ]);

    // Insert Casablanca
    $stmt->execute([
        'm_title' => 'Casablanca',
        'm_year' => 1942,
        'm_rating' => 4,
        'm_type' => 'Movie',
        'm_img_data' => file_get_contents('https://cdn11.bigcommerce.com/s-j3ptcnmq25/images/stencil/2560w/products/1883/3416/51cNCX-dOkL__89126__03005.1627579337.jpg'),
        'm_color_two' => '#4E4441',
        'm_color_three' => '#E9DFDA',
    ]);

    // Insert Dark Souls 1
    $stmt->execute([
        'm_title' => 'Dark Souls 1',
        'm_year' => 2011,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://m.media-amazon.com/images/M/MV5BYTk4YmExZGUtZWIyYy00MzRjLWIzMzYtYmRmOGUyOWIxNjU1XkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg'),
        'm_color_two' => '#28829C',
        'm_color_three' => '#E0F1F7',
    ]);

    // Insert Cowboy Bebop
    $stmt->execute([
        'm_title' => 'Cowboy Bebop',
        'm_year' => 1998,
        'm_rating' => 5,
        'm_type' => 'Anime',
        'm_img_data' => file_get_contents('https://www.themoviedb.org/t/p/original/7zcIgfFGtHGyvS9tQhCFmjoMu14.jpg'),
        'm_color_two' => '#CB2C16',
        'm_color_three' => '#CC548C',
    ]);

    // Insert Evangelion
    $stmt->execute([
        'm_title' => 'Evangelion',
        'm_year' => 1995,
        'm_rating' => 5,
        'm_type' => 'Anime',
        'm_img_data' => file_get_contents('https://m.media-amazon.com/images/M/MV5BMTc4YTY0MDUtYWNmMi00NTRiLWE4NmItM2JiMmIzYmEwNGQzXkEyXkFqcGdeQXVyNTkwNzYyODM@._V1_.jpg'),
        'm_color_two' => '#4F4669',
        'm_color_three' => '#DA3731',
    ]);

    // Insert Persona 4 Golden
    $stmt->execute([
        'm_title' => 'Persona 4 Golden',
        'm_year' => 2012,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://www.juegostorrentpc.net/wp-content/uploads/2020/07/P4G-Cover.jpg'),
        'm_color_two' => '#ffa500',
        'm_color_three' => '#fff523',
    ]);

    // Insert Animal Well
    $stmt->execute([
        'm_title' => 'Animal Well',
        'm_year' => 2024,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://assetsio.reedpopcdn.com/co4hdh.jpg?width=1920&height=1920&fit=bounds&quality=80&format=jpg&auto=webp'),
        'm_color_two' => '#37356A',
        'm_color_three' => '#196157',
    ]);

    // Insert Doki Doki Literature Club!
    $stmt->execute([
        'm_title' => 'Doki Doki Literature Club!',
        'm_year' => 2017,
        'm_rating' => 4,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://gamefaqs.gamespot.com/a/box/0/0/1/803001_front.jpg'),
        'm_color_two' => '#7F92CD',
        'm_color_three' => '#F8B5E0',
    ]);

    // Insert Outer Wilds
    $stmt->execute([
        'm_title' => 'Outer Wilds',
        'm_year' => 2019,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://assetsio.reedpopcdn.com/co65ac.jpg'),
        'm_color_two' => '#1B2831',
        'm_color_three' => '#F68F26',
    ]);

    // Insert Oxenfree
    $stmt->execute([
        'm_title' => 'Oxenfree',
        'm_year' => 2016,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('https://tse1.mm.bing.net/th?id=OIP.u9PoGVjcJh6MDnQrFItdwQHaLK&pid=Api&f=1&ipt=6e7edb1c4d12335c6b3fe135d9245d0a9382c17ee1f96c2ac45c870c30aa5f60&ipo=images'),
        'm_color_two' => '#763644',
        'm_color_three' => '#495973',
    ]);

    // Insert Fear & Hunger
    $stmt->execute([
        'm_title' => 'Fear & Hunger',
        'm_year' => 2018,
        'm_rating' => 5,
        'm_type' => 'Videogame',
        'm_img_data' => file_get_contents('http://www.world-art.ru/games/img/50000/49670/1.jpg'),
        'm_color_two' => '#372114',
        'm_color_three' => '#5B5637',
    ]);

} catch (PDOException $e) {
    die("\nERROR: media table debug polpulation failed: " . $e->getMessage());
}

