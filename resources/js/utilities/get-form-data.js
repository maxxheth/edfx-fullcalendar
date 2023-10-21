export const getFormData = () => ({
    title: document.getElementById('title').value,
    status: document.getElementById('status').value,
    channel_type: document.getElementById('channel_type').value,
    modality: document.getElementById('modality').value,
    notes: document.getElementById('notes').value,
    lead_forecast: Number(document.getElementById('lead_forecast').value),
    lead_actual: Number(document.getElementById('lead_actual').value),
    calendar_id: document.getElementById('calendar_id').value,  // Assuming there's a field with id 'calendar_id'
    date: document.getElementById('date').value,
    is_synced_in_wrike: document.getElementById('sync_wrike').checked,
});
