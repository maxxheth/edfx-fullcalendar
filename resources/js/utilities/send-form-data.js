import { updateButtonState } from "./update-button-state";
import { updateDailyLeadForecastTotals } from "./update-daily-lead-forecast-totals";
import { toggleModal } from "./toggle-modal";

export const sendFormData = async (formDataJSON, endpoint = '/create-event') => {
    try {
        const response = await fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: formDataJSON,
        });
        const data = await response.json();

        const dataProps = Object.entries(data).filter(([key, value]) => {
            return key !== 'title' && key !== 'date' && key !== 'id' && key !== 'borderColor';
        });

        const newData = Object.fromEntries(dataProps);

        console.log({ newData });

        console.log({ dataProps });
        const newEvent = {
            title: data.title,
            start: data.date,
            url: `/event/${data.id}`,
            borderColor: data.borderColor,
            id: data.id,
            extendedProps: {
                ...Object.fromEntries(dataProps)
            }
        };

        switch (endpoint) {
            case '/create-event':
                window.calendar.addEvent(newEvent);
                //location.reload();
                break;
            case '/update-event':
                const existingEvent = window.calendar.getEventById(data.id);
                existingEvent.setProp('title', newEvent.title);
                existingEvent.setProp('start', newEvent.start);
                existingEvent.setProp('url', newEvent.url);
                existingEvent.setProp('borderColor', newEvent.borderColor);
                Object.keys(newEvent.extendedProps).forEach(key => {
                    existingEvent.setExtendedProp(key, newEvent.extendedProps[key]);
                });
                break;
        }

        toggleModal();
        updateDailyLeadForecastTotals(window.calendar.getEvents());

    } catch (error) {
        console.error('Error:', error);
        const submitButton = document.querySelector('button[type="submit"]');
        updateButtonState(submitButton, false);
    }
};
