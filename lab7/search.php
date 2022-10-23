<?php
$query = $_GET["query"];
$query_encoded = urlencode($query);

if (empty($query)) {
    echo "<div style='text-align: center'>" . "За запитом $query нічого не знайдено!" . "</div>";
    return;
}

$channel = curl_init();
curl_setopt($channel, CURLOPT_URL, "https://www.foxtrot.com.ua/uk/search?query={$query_encoded}");
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($channel);
curl_close($channel);

preg_match_all(
    "/<div class=\"listing__body-wrap image-switch\">(.*)<\/section>/s",
    $html,
    $matches
);

if (empty($matches[0][0])) {
    echo "<div style='text-align: center'>" . "За запитом $query нічого не знайдено" . "</div>";
} else {
    echo $matches[0][0];
}