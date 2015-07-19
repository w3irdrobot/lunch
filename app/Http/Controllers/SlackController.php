<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization;
use App\Poll;

class SlackController extends Controller
{
    public function outgoingVote(Request $request, $id) {
        $organization = Organization::findOrFail($id);
        $poll = Poll::orderBy('created_at', 'desc')->first();

        $message = "Here's today's choices for lunch: ";
        $message .= $poll->restaurants->implode('name', ', ');
        $message .= ". Make sure to `/vote` your response!";
        $body = json_encode(['text' => $message]);

        $client = new \GuzzleHttp\Client();
        $res = $client->post($organization->incoming_slack_link, ['body' => $body]);

        return redirect()->route('organization.view', [$organization->id]);
    }
}