$url = "https://share.google/YzVUbUMvHy1fzrUkl"
try {
    $req = [System.Net.WebRequest]::Create($url)
    $req.UserAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
    $req.AllowAutoRedirect = $true
    $res = $req.GetResponse()
    $finalUrl = $res.ResponseUri.ToString()
    Write-Output "Final URL: $finalUrl"
    
    $stream = $res.GetResponseStream()
    $reader = New-Object System.IO.StreamReader($stream)
    $html = $reader.ReadToEnd()
    $html | Out-File "f:\Rapture\scratch\final_maps_page.html" -Encoding utf8
    Write-Output "Downloaded page. Length: $($html.Length)"
} catch {
    Write-Output "Error: $_"
}
