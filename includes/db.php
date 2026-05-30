<?php
/**
 * Rapture Therapy Centre — SQLite Database Connection
 * Auto-creates database + all tables on first run.
 */

function getDB(): PDO {
    static $db = null;
    if ($db !== null) return $db;

    $dbPath = __DIR__ . '/../database/rapture.db';
    $dbDir = dirname($dbPath);
    if (!is_dir($dbDir)) mkdir($dbDir, 0755, true);

    $isNew = !file_exists($dbPath);
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->exec('PRAGMA journal_mode=WAL');
    $db->exec('PRAGMA foreign_keys=ON');

    if ($isNew) {
        createSchema($db);
    }

    return $db;
}

function createSchema(PDO $db): void {
    $db->exec("
        CREATE TABLE IF NOT EXISTS admins (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            password_hash TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS therapists (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            credential TEXT DEFAULT '',
            bio TEXT DEFAULT '',
            photo TEXT DEFAULT '',
            category TEXT DEFAULT 'speech',
            specialties TEXT DEFAULT '',
            rating REAL DEFAULT 5.0,
            is_available INTEGER DEFAULT 1,
            is_founder INTEGER DEFAULT 0,
            founder_label TEXT DEFAULT '',
            sort_order INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS services (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT UNIQUE NOT NULL,
            badge_text TEXT DEFAULT '',
            description TEXT DEFAULT '',
            sub_sections TEXT DEFAULT '[]',
            conditions_list TEXT DEFAULT '[]',
            red_flags TEXT DEFAULT '[]',
            card_title TEXT DEFAULT '',
            icon TEXT DEFAULT 'ri-heart-pulse-line',
            category_color TEXT DEFAULT 'speech',
            sort_order INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS articles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT UNIQUE NOT NULL,
            excerpt TEXT DEFAULT '',
            content TEXT DEFAULT '',
            featured_image TEXT DEFAULT '',
            category TEXT DEFAULT 'speech',
            category_label TEXT DEFAULT 'Speech & Language',
            author TEXT DEFAULT 'Clinical Team',
            meta_description TEXT DEFAULT '',
            meta_keywords TEXT DEFAULT '',
            read_time TEXT DEFAULT '10 MIN READ',
            is_published INTEGER DEFAULT 1,
            published_date DATE DEFAULT (date('now')),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");
}
