<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushNotification;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription as PushSub;

class PushNotificationController extends Controller
{
    // Save subscription sent from browser
    public function save(Request $request)
    {
        PushNotification::updateOrCreate(
            ['endpoint' => $request->endpoint],
            [
                'p256dh' => $request->keys['p256dh'],
                'auth'   => $request->keys['auth']
            ]
        );

        return response()->json(['message' => 'PushNotification saved']);
    }


    // Send notification message
    public function send(Request $request)
    {
        $message = $request->message ?? "Hello User!";

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
                PushSub::create([
                    'endpoint' => $sub->endpoint,
                    'publicKey' => $sub->p256dh,
                    'authToken' => $sub->auth,
                ]),
                json_encode(['title' => 'New Message', 'body' => $message])
            );
        }

        return response()->json(['message' => 'Notification sent']);
    }
}
