<?php

namespace App\Listeners;

use App\Models\EmailLog;
use Illuminate\Mail\Events\MessageSent;

class LogEmailSent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {

        $data = $event->data['data'] ?? null;

        if ($data) {
            $toEmail = $data['email'] ?? 'no-email';
            $toName = $data['name'] ?? 'no-name';
            $toMessage = $data['message'] ?? 'no-message';

            //Check if there is a previous history of this email
            $emailLog = EmailLog::where('email', $toEmail)->first();

            // If there is a previous record, add the message to it, if not, create a new record
            if ($emailLog) {
                // Update existing record (add the new message to the array)
                $messages = $emailLog->message ?? [];
                $messages[] = [
                    'content' => $toMessage,
                    'timestamp' => now()->toDateTimeString(),
                ];

                // Update messages in the database
                $emailLog->update([
                    'message' => $messages,
                    'is_notified' => false,
                ]);
            } else {
                // If there is no record, create a new record
                EmailLog::create([
                    'name' => $toName,
                    'email' => $toEmail,
                    'message' => [
                        [
                            'content' => $toMessage,
                            'timestamp' => now()->toDateTimeString(),
                        ],
                    ],
                    'sent_at' => now(),
                ]);
            }
        }
    }

}
