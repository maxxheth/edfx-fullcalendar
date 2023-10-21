export const updateButtonState = (button, isLoading) => {
    if (!button) {
        throw new Error('No button passed to updateButtonState()');
    }
    const originalButtonText = button.textContent;
    if (isLoading) {
        button.innerHTML = `
            <div aria-label="Loading..." role="status">
                <!-- svg loading spinner -->
            </div>
            Updating...
        `;
        button.disabled = true;
    } else {
        button.innerHTML = originalButtonText;
        button.disabled = false;
    }
};