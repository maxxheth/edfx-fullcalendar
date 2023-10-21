<!-- <x-app> -->
<div>

<!-- @push('scripts')
    <script src="{{ assetFromManifest('resources/js/app.js') }}"></script>
@endpush -->

    <div class="flex mx-auto mb-4">
    <div class="ml-auto flex flex-col">
        <div class="flex flex-col w-[170px]">
            <label for="channelType" class="block text-sm text-gray-500 dark:text-gray-300">Channel Type</label>
            <select id="channelType" class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-2 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">
                <option value="">All Channel Types</option>
                <option value="EMAIL">Email</option>
                <option value="TEXT">Text</option>
                <option value="OTHER">Other</option>
            </select>
        </div>

        <div class="flex flex-col mt-4">
            <label for="modality_filter" class="block text-sm text-gray-500 dark:text-gray-300">Modality</label>
            <select id="modality_filter" class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-2 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">
                <option value="">All Modalities</option>
                <option value="ALM">ALM</option>
                <option value="LHR">LHR</option>
                <option value="CS">CS</option>
                <option value="BTX">BTX</option>
                <option value="XE">XE</option>
                <option value="FIL">FIL</option>
                <option value="ULT">ULT</option>
                <option value="IPL">IPL</option>
                <option value="CT">CT</option>
                <option value="CS_CT">CS/CT</option>
                <option value="IPL_ULT">IPL/ULT</option>
                <option value="WRX_INJ">WRX/INJ</option>
                <option value="WRX">WRX</option>
                <option value="BODY">BODY</option>
                <option value="FACE">FACE</option>
                <option value="OTH">OTH</option>
            </select>
        </div>
    </div>
</div>


    <div id="calendar"></div>
    <!-- <x-event-modal /> -->
</div>
<!-- </x-app> -->
