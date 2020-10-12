window._ = require('lodash');

window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['Content-Type'] = 'application/json';
window.axios.defaults.headers.common['Accept'] = 'application/json';
window.axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').content;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

// with ssl
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 888,
//     wssPort: 888,
//     disableStats: true,
//     forceTLS: true,
//     enabledTransports: ['ws', 'wss'],
// });

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: parseInt(process.env.PUSHER_PORT),
    forceTLS: false,
    disableStats: true,
});
