<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Models\EmailLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function index()
    {
        $latestEmails = EmailLog::orderBy('created_at', 'desc')->paginate(12);

        return view('emails.show_all_messages', compact('latestEmails'));
    }

    public function viewMessage($id)
    {
        // Fetch the record using the id
        $emailLog = EmailLog::findOrFail($id);

        // Prepare the conversation matrix
        $conversation = [];
        $messages = $emailLog->message ?? [];
        $replies = $emailLog->replies ?? [];

        // Add messages to the conversation
        foreach ($messages as $msg) {
            $conversation[] = [
                'type' => 'message',
                'content' => $msg['content'],
                'timestamp' => $msg['timestamp'],
            ];
        }

        // Add replies to the conversation
        foreach ($replies as $reply) {
            $conversation[] = [
                'type' => 'reply',
                'content' => $reply['content'],
                'timestamp' => $reply['timestamp'],
            ];
        }

        // Arrange the conversation by time
        usort($conversation, function ($a, $b) {
            return strtotime($a['timestamp']) - strtotime($b['timestamp']);
        });

        return view('emails.show_message', compact('emailLog', 'conversation'));
    }


    public function replyMessage(Request $request, $id)
    {
        $emailLog = EmailLog::findOrFail($id);

        $newReply = [
            'content' => $request->input('reply'),
            'timestamp' => now()->toDateTimeString(),
        ];

        $replies = $emailLog->replies ?? [];
        $replies[] = $newReply;

        $emailLog->update(['replies' => $replies]);

        Mail::to($emailLog->email)->send(new ReplyMail($emailLog->name, $request->input('reply')));

        return redirect()->back()->with('success', 'Die Antwort wurde erfolgreich gesendet');
    }

}
