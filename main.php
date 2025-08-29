<?php
function searchMovie($title)
{
    $config = include __DIR__ . '/config.php';

    $url = $config['base_url'] . "/search/movie?query=" . urlencode($title) . "&language=fr-FR";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $config['api_key'],
        'Content-Type: application/json;charset=utf-8'
    ]);

    // désactivation SSL pour test local
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // fin de bloc

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $httpCode !== 200) {
        error_log("Erreur TMDb : impossible de récupérer les données pour '$title' (HTTP $httpCode)");
        return ['results' => []];
    }

    $data = json_decode($response, true);
    if (!isset($data['results'])) {
        return ['results' => []];
    }

    return $data;
}