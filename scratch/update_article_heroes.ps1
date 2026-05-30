# Update all article pages: replace article-header-clean with page-hero + article-meta section
$articlesDir = "f:\Rapture\articles"
$files = Get-ChildItem -Path $articlesDir -Filter "*.html"

foreach ($file in $files) {
    $content = [System.IO.File]::ReadAllText($file.FullName, [System.Text.Encoding]::UTF8)
    
    # Match the entire article-header-clean block (handles both indentation styles)
    # Pattern: from <header class="article-header-clean"> to </header> (the article header one)
    $pattern = '(?s)\s*<header class="article-header-clean">\s*<div class="container">\s*<div class="article-breadcrumb">.*?</div>\s*<h1>(.*?)</h1>\s*<div class="article-meta-clean">(.*?)</div>\s*</div>\s*</header>'
    
    $match = [regex]::Match($content, $pattern)
    
    if ($match.Success) {
        $title = $match.Groups[1].Value.Trim()
        $metaContent = $match.Groups[2].Value.Trim()
        
        # Build the replacement: page-hero + article meta section
        $replacement = @"

    <section class="page-hero" style="background-image: url('../assets/occupational_therapy.png');">
        <div class="page-hero-content">
            <h1>Learning Centre</h1>
            <div class="page-breadcrumbs">
                <a href="../index.html">Home</a> / <a href="../blog.html" style="color: rgba(255,255,255,0.7);">Learning Centre</a>
            </div>
        </div>
    </section>

    <header class="article-header-clean">
        <div class="container">
            <h1>$title</h1>
            <div class="article-meta-clean">
                $metaContent
            </div>
        </div>
    </header>
"@
        
        $newContent = $content.Substring(0, $match.Index) + $replacement + $content.Substring($match.Index + $match.Length)
        [System.IO.File]::WriteAllText($file.FullName, $newContent, [System.Text.Encoding]::UTF8)
        Write-Host "Updated: $($file.Name)"
    } else {
        Write-Host "NO MATCH: $($file.Name)"
    }
}

Write-Host "`nDone! All articles processed."
