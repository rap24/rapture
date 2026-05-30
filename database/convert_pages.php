<?php
/**
 * Conversion script — converts static HTML pages to PHP with shared header/footer.
 * Run: php database/convert_pages.php
 */

$pages = [
    'index' => 'home',
    'about' => 'about',
    'contact' => 'contact',
    'privacy' => 'privacy',
];

foreach ($pages as $name => $activePage) {
    $src = __DIR__ . '/../' . $name . '.html';
    $dst = __DIR__ . '/../' . $name . '.php';
    
    if (!file_exists($src)) {
        echo "SKIP $name (file not found)\n";
        continue;
    }
    
    $html = file_get_contents($src);
    
    // Extract body content between </header> and <footer or booking-modal
    if (preg_match('/<\/header>\s*(.*?)(?=<footer\s|<div class="booking-modal")/s', $html, $m)) {
        $body = trim($m[1]);
    } else {
        echo "WARN $name — could not extract body content\n";
        $body = '<!-- Could not auto-extract body content -->';
    }
    
    // Replace .html links with .php
    $body = preg_replace('/(?<=href=")([^"]*?)\.html/', '$1.php', $body);
    
    // Get page title
    preg_match('/<title>(.*?)<\/title>/s', $html, $tm);
    $title = $tm[1] ?? 'Rapture Therapy Centre';
    
    // Get meta description
    preg_match('/name="description"\s+content="(.*?)"/s', $html, $dm);
    $desc = $dm[1] ?? '';
    
    $php = "<?php\n";
    $php .= "\$active_page = '$activePage';\n";
    $php .= "\$page_title = '" . addslashes($title) . "';\n";
    $php .= "\$page_description = '" . addslashes($desc) . "';\n";
    $php .= "require_once __DIR__ . '/includes/header.php';\n";
    $php .= "?>\n\n";
    $php .= $body . "\n\n";
    $php .= "<?php require_once __DIR__ . '/includes/footer.php'; ?>\n";
    
    file_put_contents($dst, $php);
    echo "OK $name.php (" . strlen($body) . " bytes body)\n";
}

echo "\nConversion complete!\n";
