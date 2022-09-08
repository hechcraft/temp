<?php

namespace App\Helpers\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function sendMessage(string $messageText, string $telegramId): void
    {
        $message = sprintf(
            'https://api.telegram.org/bot%s/sendMessage?chat_id=%s&text=%s',
            config('services.telegram.key'),
            $telegramId,
            $messageText
        );

        Http::get($message);
    }

    public function sendPhoto(string $caption, string $telegramId, string $image): void
    {
        $message = sprintf(
            'https://api.telegram.org/bot%s/sendPhoto?caption=%s&chat_id=%s&photo=%s&%s',
            config('services.telegram.key'),
            $caption,
            $telegramId,
            $image,
            'parse_mode=HTML'
        );

        Http::get($message);
    }
}
