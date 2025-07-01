<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;

class EstadoPostulacionActualizado extends Notification implements ShouldBroadcast
{
    use Queueable;

    public $estado;
    public $mensaje;
    public $userId;

    public function __construct($estado, $mensaje, $userId)
    {
        $this->estado = $estado;
        $this->mensaje = $mensaje;
        $this->userId = $userId;
    }

    public function via($notifiable): array
    {
        return ['broadcast', 'database'];
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'estado' => $this->estado,
            'mensaje' => $this->mensaje,
        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'estado' => $this->estado,
            'mensaje' => $this->mensaje,
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('postulacion.estado.' . $this->userId),
        ];
    }

    public function broadcastAs()
    {
        return 'EstadoPostulacionActualizado';
    }
}
