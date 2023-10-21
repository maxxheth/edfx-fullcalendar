import { validateFormData } from '../utilities/validate-form-data.js';
import { toggleModal } from '../utilities/toggle-modal.js';
import { sendFormData } from '../utilities/send-form-data.js';

export const eventModalHandlerInit = () => {
  const eventModal = document.getElementById('event-modal');
  const closeButton = document.getElementById('close-button');
  const eventForm = document.getElementById('event-form');

  // window.toggleModal = (id = false, type = 'create', chosenDay = undefined) => {
  //   if (id && !isNaN(id)) {
  //     eventModal.dataset.id = id;
  //   }
  //   if (chosenDay) {
  //     eventModal.dataset.date = chosenDay.dataset.date;
  //   }
  //   const title = eventModal.querySelector('#event-modal-title');
  //   const submitButton = eventModal.querySelector('button[type="submit"]');
  //   const viewLink = eventModal.querySelector('#viewLink');
  //   viewLink.href = `/admin/events/${id}`;
  //   switch (type) {
  //     case 'create':
  //       title.textContent = 'Create Event';
  //       submitButton.textContent = 'Create';
  //       break;
  //     case 'update':
  //       title.textContent = 'Update Event';
  //       submitButton.textContent = 'Update';
  //       break;
  //   }
  //   if (eventModal.classList.contains('hide')) {
  //     eventModal.classList.remove('hide');
  //     eventModal.classList.add('show');
  //   } else {
  //     eventModal.classList.remove('show');
  //     eventModal.classList.add('hide');
  //     eventModal.dataset.id = false;
  //   }
  //   return eventModal;
  // };

  closeButton.addEventListener('click', () => toggleModal());

  fetch('/get-random-calendar')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
      }
      return response.json();
    })
    .then(data => {

      const { id: calendarId } = data;

      console.log('Calendar Data:', data);

      eventForm.addEventListener('submit', e => {

        e.preventDefault();

        const id = eventModal.dataset.id;

        const formData = {
          title: document.getElementById('title').value,
          status: document.getElementById('status').value,
          channel_type: document.getElementById('channel_type').value,
          modality: document.getElementById('modality').value,
          notes: document.getElementById('notes').value,
          lead_forecast: Number(document.getElementById('lead_forecast').value),
          lead_actual: Number(document.getElementById('lead_actual').value),
          calendar_id: calendarId ?? 1,
          date: document.getElementById('date').value,
          is_synced_in_wrike: document.getElementById('sync_wrike').checked,
        };

        console.log('form data:');
        console.log(formData)
        const submitButton = eventModal.querySelector('button[type="submit"]');

        // const originalButtonText = submitButton.textContent;
        submitButton.innerHTML = `
          <div aria-label="Loading..." role="status">
            <svg class="animate-spin w-6 h-6 stroke-white" viewBox="0 0 256 256">
              <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
              <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            </svg>
          </div>
          Updating...
        `;
        submitButton.disabled = true;

        // const restoreButton = () => {
        //   submitButton.innerHTML = originalButtonText;
        //   submitButton.disabled = false;
        // };


        if (id && !isNaN(id)) {
          formData.id = id;
          validateFormData(formData, eventModal);
          sendFormData(JSON.stringify(formData), '/update-event');
        } else {
          validateFormData(formData, eventModal);
          sendFormData(JSON.stringify(formData), '/create-event');
        }
      });
    })
    .catch(error => console.error('Calendar Data Error:', error));

};

