import EchoClass from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new EchoClass({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo = echo;

echo.channel('leads.1')
    .listen('LeadsAdded', (e) => {
        console.log(e);
        Livewire.dispatch('updateData', [e.lead.id]);
    });
