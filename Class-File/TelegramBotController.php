<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use WeStacks\TeleBot\TeleBot;

class TelegramBotController extends Controller
{
    //+++++++++++++++++++++++++++++++++++++++
    private $bot;
    private $message_text;
    private $chat_id = 5123543075;
    //+++++++++++++++++++++++++++++++++++++++
    public function __construct()
    {
        $this->bot = new TeleBot('YOUR TOKEN');
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function index()
    {
        return view('welcome');
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function telegram_webhook(Request $request)
    {
        //+++++++++++++++++++++++++++++++++++++++++
        //Webhook
        //+++++++++++++++++++++++++++++++++++++++++
        $data = json_decode($request->all());
        if ($data) {
            $this->chat_id      = $data->message->chat->id;
            $this->message_text = $data->message->text;
        }
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendMessage(Request $request)
    {
        try {
            $message = $this->bot->sendMessage([
                'chat_id'      => $this->chat_id,
                'text'         => 'Welcome To Code-180 Youtube Channel',
                'reply_markup' => [
                    'inline_keyboard' => [[[
                        'text' => '@code-180',
                        'url'  => 'https://www.youtube.com/@code-180/videos',
                    ]]],
                ],
            ]);
            // $message = $this->bot->sendMessage([
            //     'chat_id' => $this->chat_id,
            //     'text'    => 'Welcome To Code-180 Youtube Channel',
            // ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendPhoto(Request $request)
    {
        try {
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // 1. https://anyurl/640
            // 2. fopen('local/file/path', 'r')
            // 3. fopen('https://picsum.photos/640', 'r'),
            // 4. new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = $this->bot->sendPhoto([
                'chat_id' => $this->chat_id,
                'photo'   => [
                    'file'     => fopen(asset('public/upload/img.jpg'), 'r'),
                    'filename' => 'demoImg.jpg',
                ],
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendAudio(Request $request)
    {
        try {
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // 1. https://picsum.photos/640
            // 2. fopen('local/file/path', 'r')
            // 3. fopen('https://picsum.photos/640', 'r'),
            // 4. new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = $this->bot->sendAudio([
                'chat_id' => $this->chat_id,
                'audio'   => fopen(asset('public/upload/demo.mp3'), 'r'),
                'caption' => "Demo Audio File",
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendVideo(Request $request)
    {
        try {
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // 1. https://picsum.photos/640
            // 2. fopen('local/file/path', 'r')
            // 3. fopen('https://picsum.photos/640', 'r'),
            // 4. new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = $this->bot->sendVideo([
                'chat_id' => $this->chat_id,
                'video'   => fopen(asset('public/upload/Password.mp4'), 'r'),
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendVoice(Request $request)
    {
        try {
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // 1. https://picsum.photos/640
            // 2. fopen('local/file/path', 'r')
            // 3. fopen('https://picsum.photos/640', 'r'),
            // 4. new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = $this->bot->sendVoice([
                'chat_id' => $this->chat_id,
                'voice'   => fopen(asset('public/upload/demo.mp3'), 'r'),
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendDocument(Request $request)
    {
        try {
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            // 1. https://picsum.photos/640
            // 2. fopen('local/file/path', 'r')
            // 3. fopen('https://picsum.photos/640', 'r'),
            // 4. new InputFile(fopen('https://picsum.photos/640', 'r'), 'test-image.jpg')
            //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $message = $this->bot->sendDocument([
                'chat_id'  => $this->chat_id,
                'document' => fopen(asset('public/upload/Test_Doc.pdf'), 'r'),
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendLocation(Request $request)
    {
        try {
            $message = $this->bot->sendLocation([
                'chat_id'   => $this->chat_id,
                'latitude'  => 19.6840852,
                'longitude' => 60.972437,
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendVenue(Request $request)
    {
        try {
            $message = $this->bot->sendVenue([
                'chat_id'   => $this->chat_id,
                'latitude'  => 19.6840852,
                'longitude' => 60.972437,
                'title'     => 'The New Word Of Code',
                'address'   => 'Address For The Place',
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendContact(Request $request)
    {
        try {
            $message = $this->bot->sendContact([
                'chat_id'      => $this->chat_id,
                'photo'        => 'https://picsum.photos/640',
                'phone_number' => '1234567890',
                'first_name'   => 'Code-180',
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function sendPoll(Request $request)
    {
        try {
            $message = $this->bot->sendPoll([
                'chat_id'  => $this->chat_id,
                'question' => 'What is best coding language for 2023',
                'options'  => ['python', 'javascript', 'typescript', 'php', 'java'],
            ]);
        } catch (Exception $e) {
            $message = 'Message: ' . $e->getMessage();
        }
        return Response::json($message);
    }

}
