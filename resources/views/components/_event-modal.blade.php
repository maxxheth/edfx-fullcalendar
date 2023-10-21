<div id="event-modal" x-data="{ showModal: false }"
    x-init="window.toggleModal = () => { showModal = !showModal }"
    x-show="showModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-full"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-full"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-0">
    <div class="mx-auto overflow-hidden rounded-lg bg-white shadow-xl sm:w-full sm:max-w-xl">
        <div class="relative p-6">
            <button x-on:click="showModal = false" class="absolute right-4 top-4 rounded-lg bg-red-500 p-1 text-center text-white">X</button>
            <h3 class="text-secondary-900 text-lg font-medium">Add New Item</h3>
            <form x-on:submit.prevent="handleSubmit" class="mt-2 space-y-5">
                <!-- form fields here -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title</label>
                    <input x-model="title" type="text" id="title" required class="focus:border-primary-400 focus:ring-primary-200 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50" />
                </div>
                <!-- ... other form fields ... -->
                <button type="submit" class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200">Add</button>
            </form>
        </div>
    </div>
</div>

<script>
    function handleSubmit() {
        const formData = {
            title: this.title,
            status: this.status,
            color: this.color,
            channelType: this.channelType,
            channelId: this.channelId,
            leadForecast: this.leadForecast,
            leadActual: this.leadActual,
        };
        // handle submit
    }
</script>

