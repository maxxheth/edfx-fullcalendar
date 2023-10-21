import { calendarInit } from './calendar';
import { eventModalHandlerInit } from './calendar/event-modal-handler';

document.addEventListener('DOMContentLoaded', function() {
    eventModalHandlerInit();
    calendarInit();
});
