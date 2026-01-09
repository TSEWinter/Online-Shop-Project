-- Энгийн категорийн хүснэгт үүсгэх
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(100) NOT NULL UNIQUE,
    icon VARCHAR(50),
    is_active TINYINT(1) DEFAULT 1,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Анхны категоринуудыг оруулах
INSERT INTO categories (name, slug, icon, display_order) VALUES
('Цамц', 'shirts', '👕', 1),
('Өмд', 'pants', '👖', 2),
('Гутал', 'shoes', '👟', 3),
('Футболк', 'tshirts', '🎽', 4),
('Гар утас', 'mobile-phones', '📱', 5),
('Компьютер', 'computers', '💻', 6),
('Наушних', 'headphones', '🎧', 7),
('Цаг', 'watches', '⌚', 8);
