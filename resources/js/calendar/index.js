import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import { getEventByIdInit } from './get-event-by-id.js';
import { updateDailyLeadForecastTotals } from '../utilities/update-daily-lead-forecast-totals.js';

export const calendarInit = () => {
  document.addEventListener('DOMContentLoaded', function () {

    const emailIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
</svg>
`;

    const textIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
</svg>
`;

    const otherIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 h-4">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
    </svg>`;

    const wrikeAlertIcon = `
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
</svg>

    `;

    const calendarEl = document.getElementById('calendar-inner');

    console.log({calendarEl})

    console.log('This calendar script is running!')

    const calendar = new Calendar(calendarEl, {
      plugins: [dayGridPlugin, interactionPlugin],
      initialView: 'dayGridMonth',
      events: '/events',
      editable: true,
      eventBorderColor: '#378006',
      eventDrop: function(info) {
        let eventId = info.event.id;

        // Convert date to a format MySQL will accept
        let date = new Date(info.event.start.toISOString());
        let newDate = date.getFullYear() + '-'
                      + String(date.getMonth() + 1).padStart(2, '0') + '-'
                      + String(date.getDate()).padStart(2, '0') + ' '
                      + String(date.getHours()).padStart(2, '0') + ':'
                      + String(date.getMinutes()).padStart(2, '0') + ':'
                      + String(date.getSeconds()).padStart(2, '0');

        // Send POST request to update event
        fetch('/update-event-date', {  // Updated URL to match new Laravel route
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
        //    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),  // Add CSRF token for Laravel
          },
          body: JSON.stringify({
            id: eventId,
            date: newDate
          })
        })
        .then(response => response.json())
        .then(_ => {
          //console.log('Event updated:', data);
          updateDailyLeadForecastTotals(calendar.getEvents());
        })
        .catch(error => console.error('Error:', error));
      },
      eventContent: function(arg) {
        //console.log({eventContentArg: arg});
        let icon;

        const {borderColor} = arg;
        switch (arg.event.extendedProps.channel_type) {
          case 'EMAIL':
            icon = emailIcon;
            break;
          case 'TEXT':
            icon = textIcon;
            break;
          default:
            icon = otherIcon;
        }

        const isSyncedInWrike = arg.event.extendedProps.is_synced_in_wrike;

        let title = arg.event.title;
        let leadForecast = arg.event.extendedProps.lead_forecast;


        let leadForecastHTML =`<div class="fc-event flex" title="${title} (${leadForecast ?? 0})">`;
        let noLeadForecastHTML = `<div class="fc-event flex" title="${title}">`;
        let iconAndTitleHtml = ``;

        if (!Boolean(leadForecast)) {
          iconAndTitleHtml += noLeadForecastHTML;
        } else {
          iconAndTitleHtml += leadForecastHTML;
        }

        iconAndTitleHtml += `
            <div class="fc-daygrid-event-dot" style="border-color: ${borderColor}"></div>
            <div class="text-base">${icon}</div>`

        if (!isSyncedInWrike) {
          iconAndTitleHtml += `
            <div class="text-base text-red">${wrikeAlertIcon}</div>
          `;
        }

        iconAndTitleHtml += `
            <div class="fc-event-title whitespace-normal" style="color: ${borderColor}">${title} <span class='inline-flex items-center rounded-md bg-green-50 px-2 py-0 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20'>${leadForecast}</span></div>
          </div>
        `;
        return { html: iconAndTitleHtml };
      },
      datesSet: function(dateInfo) {
        fetchEventsAndUpdateCalendar();
      },
      eventsSet: function(events) {
        updateDailyLeadForecastTotals(events);
      }
    });

    calendar.render();
    window.calendar = calendar;
    getEventByIdInit(calendarEl);

//    fetch('/events').then(response => response.json()).then(data => {
//      console.log({initData: data});
//    }).catch(err => console.log(err));

    document.getElementById('channelType').addEventListener('change', fetchEventsAndUpdateCalendar);
    document.getElementById('modality_filter').addEventListener('change', fetchEventsAndUpdateCalendar);

    function fetchEventsAndUpdateCalendar() {
      const channelType = document.getElementById('channelType').value;
      const modality = document.getElementById('modality_filter').value;

      fetch(`/filter-events?channelType=${channelType}&modality=${modality}`)
        .then(response => response.json())
        .then(data => {
          //console.log({ updatedData: data });
          updateCalendarEvents(data);
        })
        .catch(err => console.log(err));
    }

    function updateCalendarEvents(events) {
      calendar.removeAllEvents();
      calendar.addEventSource(events);
      calendar.render();
    }

    // function updateDailyLeadForecastTotals(events) {

    //   //console.log('updateDailyLeadForecastTotals running');

    //   let dailyTotals = {};

    //   for (let event of events) {
    //     let startStr = event.startStr.split('T')[0];
    //     if (!dailyTotals[startStr]) {
    //       dailyTotals[startStr] = 0;
    //     }
    //     dailyTotals[startStr] += event.extendedProps.lead_forecast;
    //   }

    //   for (let dateStr in dailyTotals) {
    //     let dayEl = document.querySelector(`.fc-daygrid-day[data-date="${dateStr}"] .fc-daygrid-day-frame`);
    //     if (dayEl) {
    //       let totalEl = dayEl.querySelector('.lead-forecast-total');
    //       if (!totalEl) {
    //         totalEl = document.createElement('div');
    //         totalEl.className = 'lead-forecast-total mb-2 inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-base font-medium text-green-700 ring-1 ring-inset ring-green-600/20';
    //         dayEl.appendChild(totalEl);
    //       }
    //       totalEl.textContent = `${dailyTotals[dateStr]}`;
    //     }
    //   }
    // }
  });
};

