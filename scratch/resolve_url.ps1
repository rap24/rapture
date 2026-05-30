$url = "https://share.google/YzVUbUMvHy1fzrUkl"
$request = [System.Net.WebRequest]::Create($url)
$request.AllowAutoRedirect = $false
try {
    $response = $request.GetResponse()
    $redirectUrl = $response.Headers["Location"]
    Write-Output "Redirect URL: $redirectUrl"
} catch {
    Write-Output "Error: $_"
}
