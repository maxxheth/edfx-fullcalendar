export const updateDailyLeadForecastTotals = (events) => {
    console.log('updateDailyLeadForecastTotals running');

    let dailyTotals = {};

    for (let event of events) {
        let startStr = event.startStr.split('T')[0];
        if (!dailyTotals[startStr]) {
            dailyTotals[startStr] = 0;
        }
        dailyTotals[startStr] += event.extendedProps.lead_forecast;
    }

    for (let dateStr in dailyTotals) {
        let dayEl = document.querySelector(`.fc-daygrid-day[data-date="${dateStr}"] .fc-daygrid-day-frame`);
        if (dayEl) {
            let totalEl = dayEl.querySelector('.lead-forecast-total');
            if (!totalEl) {
                totalEl = document.createElement('div');
                totalEl.className = 'lead-forecast-total';
                dayEl.appendChild(totalEl);
            }
            totalEl.textContent = `${dailyTotals[dateStr]}`;
        }
    }
};
