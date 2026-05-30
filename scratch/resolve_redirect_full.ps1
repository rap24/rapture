$url = "https://share.google/YzVUbUMvHy1fzrUkl"
$handler = New-Object System.Net.Http.HttpClientHandler
$handler.AllowAutoRedirect = $true
$client = New-Object System.Net.Http.HttpClient($handler)
$client.DefaultRequestHeaders.Add("User-Agent", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36")
try {
    $response = $client.GetAsync($url).Result
    $finalUrl = $response.RequestMessage.RequestUri.ToString()
    Write-Output "Final URL: $finalUrl"
    $html = $response.Content.ReadAsStringAsync().Result
    $html | Out-File "f:\Rapture\scratch\final_maps_page.html" -Encoding utf8
    Write-Output "Downloaded final page. Length: $($html.Length)"
} catch {
    Write-Output "Error: $_"
}
