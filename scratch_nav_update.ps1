$root_dir = "f:\Rapture"
$files = Get-ChildItem -Path $root_dir -Filter "*.html" -Recurse

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw
    
    $regex = '(?s)<li class="nav-item">\s*<a href="([^"]*?index\.html)" class="nav-link(.*?)">Home</a>\s*</li>'
    
    $replacement = '<li class="nav-item">
                        <a href="$1" class="nav-link$2">Home <i class="ri-arrow-down-s-line"></i></a>
                        <div class="nav-submenu">
                            <a href="$1#specialties" class="nav-submenu-link">Specialties</a>
                            <a href="$1#ecosystem" class="nav-submenu-link">Our Ecosystem</a>
                            <a href="$1#protocols" class="nav-submenu-link">Protocols</a>
                            <a href="$1#milestones" class="nav-submenu-link">Milestone Wizard</a>
                            <a href="$1#intake" class="nav-submenu-link">Intake Timeline</a>
                            <a href="$1#google-reviews" class="nav-submenu-link">Reviews</a>
                            <a href="$1#faqs" class="nav-submenu-link">FAQs</a>
                        </div>
                    </li>'
                    
    if ($content -match $regex) {
        $newContent = [regex]::Replace($content, $regex, $replacement)
        Set-Content -Path $file.FullName -Value $newContent -Encoding UTF8
        Write-Host "Updated $($file.FullName)"
    }
}
