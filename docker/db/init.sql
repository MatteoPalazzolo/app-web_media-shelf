CREATE TABLE IF NOT EXISTS media (
    id                  SERIAL          PRIMARY KEY,
    m_title             VARCHAR(255)    NOT NULL UNIQUE,
    m_year              INT             NOT NULL,
    m_rating            INT             NOT NULL,
    m_type              VARCHAR(225)    NOT NULL,
    m_img_data          BYTEA           NOT NULL,
    m_color_one         VARCHAR(7)      NOT NULL,
    m_color_two         VARCHAR(7)      NOT NULL,
    m_color_three       VARCHAR(7)      NOT NULL,
    m_active            BOOLEAN         NOT NULL
);

CREATE TABLE IF NOT EXISTS tags (
    id                  SERIAL          PRIMARY KEY,
    t_name              VARCHAR(255)    NOT NULL UNIQUE,
    t_description       TEXT            NOT NULL
);

CREATE TABLE IF NOT EXISTS media_tags (
    id_media    INT    NOT NULL    REFERENCES media(id),
    id_tag      INT    NOT NULL    REFERENCES tags(id),
    PRIMARY KEY (id_media, id_tag)
);