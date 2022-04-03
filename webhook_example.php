<?php
define("webhook_url", "WEBHOOK URL ADRESİNİZ");
define("timestamp", date("c", strtotime("now")));
$json_data = json_encode([
    "content" => "MESAJ BAŞLIĞI",
    "username" => "KULLANICI ADI",
    "avatar_url" => "AVATAR RESMİ",
    "tts" => false, //SESLİ KOMUT
    "file" => "EKLENECEK DOSYA",
    "embeds" => [
        [
            "title" => "BAŞLIK",
            "type" => "rich",
            "description" => "AÇIKLAMA",
            "url" => "EKSTRA ADRES",
            "timestamp" => timestamp,
            "color" => hexdec("3366ff"),
            "footer" => [
                "text" => "ALT METİN",
                "icon_url" => "ALT METİN SİMGESİ"
            ],
            "image" => [
                "url" => "BÜYÜK RESİM ADRESİ"
            ],
            "thumbnail" => [
                "url" => "THUMBNAIL RESİM ADRESİ"
            ],
            "author" => [
                "name" => "YAZAR İSMİ",
                "url" => "YAZAR ADRESİ"
            ],
            "fields" => [
                [
                    "name" => "EKSTRA ALAN ADI",
                    "value" => "EKSTRA ALAN İÇERİĞİ",
                    "inline" => false
                ],
                [
                    "name" => "EKSTRA ALAN ADI",
                    "value" => "EKSTRA ALAN İÇERİĞİ",
                    "inline" => true
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init(webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
echo $response;
curl_close($ch);
?>