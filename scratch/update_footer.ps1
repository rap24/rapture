$files = Get-ChildItem -Path "f:\Rapture" -Include *.html, *.php -Recurse -File -Exclude "*_static_backup*"

$oldText1 = '<a href="#" class="footer-social-link" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>'
$newText1 = '<a href="https://www.facebook.com/profile.php?id=61582809779188" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>'

$oldText2 = '<a href="#" class="footer-social-link" aria-label="Instagram"><i class="ri-instagram-fill"></i></a>'
$newText2 = '<a href="https://www.instagram.com/rapturetherapycentre/" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Instagram"><i class="ri-instagram-fill"></i></a>'

$count = 0
foreach ($f in $files) {
    $content = Get-Content $f.FullName -Raw
    if ($content -match [regex]::Escape($oldText1)) {
        $content = $content.Replace($oldText1, $newText1)
        $content = $content.Replace($oldText2, $newText2)
        Set-Content -Path $f.FullName -Value $content -NoNewline -Encoding UTF8
        Write-Host "Updated $($f.FullName)"
        $count++
    }
}
Write-Host "Total files updated: $count"
