export const toggleModal = (id = false, type = 'create', chosenDay = undefined) => {
  const eventModal = document.getElementById('event-modal');
  if (id && !isNaN(id)) {
      eventModal.dataset.id = id;
  }
  if (chosenDay) {
      eventModal.dataset.date = chosenDay.dataset.date;
  }
  const title = eventModal.querySelector('#event-modal-title');
  const submitButton = eventModal.querySelector('button[type="submit"]');
  const viewLink = eventModal.querySelector('#viewLink');
  viewLink.href = `/admin/events/${id}`;
  switch (type) {
      case 'create':
          title.textContent = 'Create Event';
          submitButton.textContent = 'Create';
          break;
      case 'update':
          title.textContent = 'Update Event';
          submitButton.textContent = 'Update';
          break;
  }
  if (eventModal.classList.contains('hide')) {
      eventModal.classList.remove('hide');
      eventModal.classList.add('show');
  } else {
      eventModal.classList.remove('show');
      eventModal.classList.add('hide');
    

      // Zero out input fields

      eventModal.querySelector('#title').value = '';
      eventModal.querySelector('#status').value = '';
      eventModal.querySelector('#channel_type').value = '';
      eventModal.querySelector('#modality').value = '';
      eventModal.querySelector('#notes').value = '';
      eventModal.querySelector('#lead_forecast').value = '';
      eventModal.querySelector('#lead_actual').value = '';
      eventModal.querySelector('#calendar_id').value = '';
      eventModal.querySelector('#date').value = '';
      eventModal.querySelector('#sync_wrike').checked = false;
      
      eventModal.dataset.id = false;
  }
  return eventModal;
};
