param(
    [string]$BaseUrl = "http://127.0.0.1:8082/",
    [string]$AdminUser = "Admin",
    [string]$AdminPassword = "Admin"
)

$ErrorActionPreference = "Stop"

function Join-BaseUrl {
    param([string]$Base, [string]$Path)

    return ($Base.TrimEnd('/') + '/' + $Path.TrimStart('/'))
}

function Assert-Route {
    param(
        [Microsoft.PowerShell.Commands.WebRequestSession]$Session,
        [string]$Url,
        [string]$Label
    )

    $response = Invoke-WebRequest -UseBasicParsing -Uri $Url -WebSession $Session
    if ($response.StatusCode -ne 200) {
        throw "La ruta '$Label' devolvio $($response.StatusCode)."
    }

    Write-Host "[OK] $Label -> $($response.StatusCode)"
    return $response
}

function Get-CsrfFields {
    param([string]$Html)

    $match = [regex]::Match($Html, 'type="hidden"\s+name="([^"]+)"\s+value="([^"]*)"')
    if (-not $match.Success) {
        return @{}
    }

    return @{ $match.Groups[1].Value = $match.Groups[2].Value }
}

$session = New-Object Microsoft.PowerShell.Commands.WebRequestSession

$publicRoutes = @(
    "",
    "news",
    "shop",
    "users",
    "players",
    "playersonline",
    "changelog",
    "legal",
    "terms",
    "privacity"
)

foreach ($route in $publicRoutes) {
    $label = if ($route -eq "") { "/" } else { "/$route" }
    Assert-Route -Session $session -Url (Join-BaseUrl $BaseUrl $route) -Label $label | Out-Null
}

$homePageResponse = Assert-Route -Session $session -Url (Join-BaseUrl $BaseUrl "") -Label "home login seed"
$loginBody = @{
    user = $AdminUser
    pass = $AdminPassword
}

$csrfFields = Get-CsrfFields -Html $homePageResponse.Content
foreach ($field in $csrfFields.Keys) {
    $loginBody[$field] = $csrfFields[$field]
}

$loginResponse = Invoke-WebRequest `
    -UseBasicParsing `
    -Uri (Join-BaseUrl $BaseUrl "home/login") `
    -Method Post `
    -Body $loginBody `
    -WebSession $session `
    -MaximumRedirection 5

if ($loginResponse.StatusCode -lt 200 -or $loginResponse.StatusCode -ge 400) {
    throw "El login admin fallo."
}

$adminResponse = Assert-Route -Session $session -Url (Join-BaseUrl $BaseUrl "admin") -Label "/admin"
if ($adminResponse.Content -notmatch 'admin-shell|Dashboard|Operaciones del proyecto') {
    throw "El panel admin respondio, pero no parece haber cargado correctamente."
}

$adminRoutes = @(
    "admin/news",
    "admin/shop",
    "admin/commands",
    "config",
    "userpanel",
    "userpanel/feedback",
    "userpanel/recharge"
)

foreach ($route in $adminRoutes) {
    Assert-Route -Session $session -Url (Join-BaseUrl $BaseUrl $route) -Label ("/" + $route) | Out-Null
}

$commandsPage = Assert-Route -Session $session -Url (Join-BaseUrl $BaseUrl "admin/commands") -Label "admin command seed"
$commandBody = @{
    txt = "Smoke test"
}

$commandCsrfFields = Get-CsrfFields -Html $commandsPage.Content
foreach ($field in $commandCsrfFields.Keys) {
    $commandBody[$field] = $commandCsrfFields[$field]
}

$commandResponse = Invoke-WebRequest `
    -UseBasicParsing `
    -Uri (Join-BaseUrl $BaseUrl "admin/global") `
    -Method Post `
    -Body $commandBody `
    -WebSession $session

if ($commandResponse.StatusCode -ne 200) {
    throw "La accion admin/global no respondio correctamente."
}

Write-Host "[OK] /admin/global -> $($commandResponse.StatusCode)"

Write-Host ""
Write-Host "Smoke test completado correctamente."
