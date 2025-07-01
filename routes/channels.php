<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('postulacion.estado.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
