import { toggleModal } from "../utilities/toggle-modal";
// Utility function to find the closest matching element
const findClosest = (target, classes) => {
  // console.log({ target, classes });
  for (const cls of classes) {
      if (target && target.matches(cls)) {
          return target?.closest(cls);
      }
  }
  return null;
};

// Function to handle fetch logic
const fetchData = async (url, options = {}) => {
  try {
      const response = await fetch(url, options);
      if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
      }
      return await response.json();
  } catch (error) {
      console.error('There has been a problem with your fetch operation:', error);
      throw error;
  }
};

const formatDate = (date) => {
  const d = new Date(date);
  const year = d.getUTCFullYear();
  const month = String(d.getUTCMonth() + 1).padStart(2, '0');  // Months are zero-based, so we add 1
  const day = String(d.getUTCDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
};

const populateForm = (form, data) => {
  for (const key in data) {
    if (form.elements[key]) {
      if (key === 'date' && data[key]) {
        const originalDate = data[key]
        const formattedDate = formatDate(data[key]);
        console.log({originalDate, formattedDate})
        form.elements[key].value = formattedDate
      } else {
        form.elements[key].value = data[key];
      }
    }
  }
};

// Main function
export const getEventByIdInit = (calendarEl = undefined) => {
  
  if (!calendarEl) return;

  calendarEl.addEventListener('click', async (e) => {
      e.preventDefault();
      // console.log('calendar click');

      // console.log({eTarget: e.target});

      try {
          const calendarData = await fetchData('/get-random-calendar');
          // console.log({ calendarData });
          const { id: calendarId } = calendarData;

          const classes = [
              '.fc-event-draggable',
              '.fc-event-title',
              '.fc-daygrid-day-frame',
              '.fc-scrollgrid-sync-inner',
              '.fc-daygrid-day-top',
              '.fc-daygrid-day-events',
              '.fc-daygrid-day-bg'
          ];
          const closestElement = findClosest(e.target, classes);

          if (closestElement && closestElement.matches('.fc-event-draggable')) {
              const href = closestElement.getAttribute('href');
              const eventId = href.split('/').pop();
              const eventData = await fetchData(`/get-event-by-id`, {
                  method: 'POST',
                  headers: { 'Content-Type': 'application/json' },
                  body: JSON.stringify({ id: eventId })
              });
              // console.log({ eventData });
              const eventModal = toggleModal(eventId, 'update');
              const eventForm = eventModal.querySelector('#event-form');

              // console.log({ eventModal });

              populateForm(eventForm, eventData);
          } else if (closestElement && closestElement.matches('.fc-event-title')) {

              const parent = closestElement.closest('.fc-event-draggable')
              const href = parent.getAttribute('href');
              const eventId = href.split('/').pop();
              const eventData = await fetchData(`/get-event-by-id`, {
                  method: 'POST',
                  headers: { 'Content-Type': 'application/json' },
                  body: JSON.stringify({ id: eventId })
              });
              // console.log({ eventData });
              const eventModal = toggleModal(eventId, 'update');
              const eventForm = eventModal.querySelector('#event-form');

              // console.log({ eventModal });

              populateForm(eventForm, eventData);

          } else {
              if (!closestElement) return;
              const fcDayElem = closestElement.closest('.fc-day');
              // console.log({fcDayElem})
              const eventModal = toggleModal(undefined, 'create', fcDayElem);
              const eventForm = eventModal.querySelector('#event-form');
              // console.log({ eventModalDate: eventModal.dataset.date })
              populateForm(eventForm, {
                  date: eventModal.dataset.date,
                  calendar_id: calendarId ?? 1
              });
          }
      } catch (error) {
          console.error('Error:', error);
      }
  }, true);
};
