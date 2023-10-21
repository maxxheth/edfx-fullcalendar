export const validateFormData = (formData, formElement) => {
    const formFields = [
        'title',
        'status',
        'channel_type',
        'lead_forecast',
        // 'lead_actual',
       'calendar_id',
        'date'
    ];

    const errors = [];

    formFields.forEach(field => {
        const fieldElement = formElement.querySelector(`#${field}`);
        const errorElement = formElement.querySelector(`#${field}_error`);

        if (formData[field] == null) {
            if (errorElement) {
                errorElement.classList.remove('hidden');
                errorElement.innerText = `${field.charAt(0).toUpperCase() + field.slice(1)} is required.`;
            }
            errors.push(`${field.charAt(0).toUpperCase() + field.slice(1)} is required.`);
        } else {
            if (errorElement) {
                errorElement.classList.add('hidden');
            }
        }
    });

    if (errors.length > 0) {
        throw new Error(errors.join(' '));
    }
};

