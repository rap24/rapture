$url = "https://share.google/YzVUbUMvHy1fzrUkl"
$handler = New-Object System.Net.Http.HttpClientHandler
$handler.AllowAutoRedirect = $true
$client = New-Object System.Net.Http.HttpClient($handler)
$client.DefaultRequestHeaders.Add("User-Agent", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36")
try {
    $response = $client.GetAsync($url).Result
    Write-Output "Status: $($response.StatusCode)"
    Write-Output "Request URI: $($response.RequestMessage.RequestUri)"
    $content = $response.Content.ReadAsStringAsync().Result
    Write-Output "Content Length: $($content.Length)"
    $content | Out-File "f:\Rapture\scratch\resolved_page.html" -Encoding utf8
} catch {
    Write-Output "Error: $_"
}
