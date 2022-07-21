<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageeController extends Controller
{
    public function message(Request $request,MessageService $messageService)
    {
        return $messageService->sendMessage($request->only(['body','channel']));
    }
}
