# Fix remaining encoding corruption: rupee symbol and multiplication sign
# Pattern: "â‚¹" (U+00E2 U+201A U+00B9) -> ₹ (U+20B9)
# Pattern: "Ã&mdash;" (U+00C3 + &mdash;) -> × (U+00D7) multiplication sign

$files = Get-ChildItem -Path "f:\Rapture" -Filter "*.html" -Recurse
$count = 0

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
    $original = $content

    # Fix corrupted rupee sign: â‚¹ -> ₹
    $corruptedRupee = [string][char]0x00E2 + [string][char]0x201A + [string][char]0x00B9
    $content = $content.Replace($corruptedRupee, [string][char]0x20B9)

    # Fix corrupted multiplication sign: Ã&mdash; -> ×
    $corruptedMultiply = [string][char]0x00C3 + '&mdash;'
    $content = $content.Replace($corruptedMultiply, [string][char]0x00D7)

    if ($content -ne $original) {
        $utf8NoBom = New-Object System.Text.UTF8Encoding($false)
        [System.IO.File]::WriteAllText($file.FullName, $content, $utf8NoBom)
        Write-Host "Fixed: $($file.FullName)"
        $count++
    }
}
Write-Host ""
Write-Host "Total files fixed: $count"
