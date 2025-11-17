<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription as WebPushSub;

class PushNotificationController extends Controller
{
    public function save(Request $request)
    {
        PushNotification::updateOrCreate(
            ['endpoint' => $request->endpoint],
            [
                'p256dh' => $request->keys['p256dh'],
                'auth'   => $request->keys['auth']
            ]
        );

        return response()->json(['saved' => true]);
    }

    public function send(Request $request)
    {
        $message = $request->message ?? "Hello from Laravel!";
        $url = $request->url ?? "/";

        $subscriptions = PushNotification::all();

        $webPush = new WebPush([
            "VAPID" => [
                "subject" => "mailto:admin@example.com",
                "publicKey" => env("VAPID_PUBLIC_KEY"),
                "privateKey" => env("VAPID_PRIVATE_KEY"),
            ],
        ]);

        foreach ($subscriptions as $sub) {
            $webPush->sendOneNotification(
                WebPushSub::create([
                    'endpoint' => $sub->endpoint,
                    'publicKey' => $sub->p256dh,
                    'authToken' => $sub->auth,
                ]),
                json_encode([
                    'title' => 'New Notification',
                    'body'  => $message,
                    'url'   => $url
                ])
            );
        }

        return response()->json(['sent' => true]);
    }
}
