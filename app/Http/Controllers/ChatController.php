<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function handle(Request $request)
    {
        $userMessage = $request->input('message', '');

        $scriptPath = base_path('scripts/chat_logic.py');

        $command = 'python "' . $scriptPath . '" "' . addslashes($userMessage) . '"';

        \Log::info("Comando ejecutado: " . $command);

        $output = shell_exec($command);

        $cleanOutput = trim($output);

        return response()->json(['reply' => $output]);
    }
}
