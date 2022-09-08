<?php

namespace App\Http\Controllers;

use App\Helpers\Services\TelegramService;
use App\Helpers\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TelegramController extends Controller
{
    public function __construct(
        private UserService     $userService,
        private TelegramService $telergramService,
    ) {
    }

    public function addingTelegram(Request $request): Redirector|Application|RedirectResponse
    {
        $user = $this->userService->updateTelegramData(
            $request->user()->id,
            $request->get('id'),
            $request->get('photo_url')
        );

        $this->telergramService->sendMessage('Telegram success added.', $user->telegram_id);
        return redirect(route('main'));
    }


    public function deleteTelegramId(): Redirector|Application|RedirectResponse
    {
        $this->userService->deleteTelegramId(\Auth::user()->id);

        return redirect(route('main'));
    }
}
