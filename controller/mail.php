<?php
require_once 'vendor/autoload.php';
function send_mail($sender,$name,$subject,$text)
{
 $mj = new \Mailjet\Client('183b6479bf7850ffa233b155cf7dd466', '9247399e7166b4e463f6ab3cd47e2161', true, ['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "tushar.gandhi0092@gmail.com",
                'Name' => "Tushar Gandhi"
            ],
            'To' => [
                [
                    'Email' => $sender,
                    'Name' => $name
                ]
            ],
            'Subject' => $subject,
            'TextPart' => "aba",
            'HTMLPart' => $text
        ]
    ]
];

$response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);

if ($response->success()) {
    return "true";
} else {
    return "false"; 
    // $response->getReasonPhrase();
}
}