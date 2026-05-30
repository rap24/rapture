$html = Get-Content -Path "f:\Rapture\scratch\final_maps_page.html" -Raw

# Search for any occurrences of reviews or comments
Write-Output "=== Review Matches ==="
$matches = [regex]::Matches($html, '(?i)(reviews|rating|stars)')
Write-Output "Found $($matches.Count) matches for review-related terms."

# Search for potential review content.
# Reviews on Google maps pages might look like text near specific classes, or inside paragraphs.
# Let's print out text around some matches.
$regex = [regex]'(?i)([^.!?]{10,200}(review|rating|stars|excellent|highly|good|great|best|nice|friendly|therapist|child|parent)[^.!?]{10,200})'
$reviewMatches = $regex.Matches($html)
Write-Output "Potential review snippets found: $($reviewMatches.Count)"
$count = 0
foreach ($m in $reviewMatches) {
    if ($count -ge 15) { break }
    $text = $m.Value.Trim()
    if ($text.Length -gt 20 -and $text -notmatch "<script" -and $text -notmatch "<style") {
        Write-Output "[$count] $text"
        Write-Output "------------------------"
        $count++
    }
}
