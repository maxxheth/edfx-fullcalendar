<div id="event-modal" class="hide fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-0">
    <div class="mx-auto overflow-hidden rounded-lg bg-white shadow-xl w-1/2">
        <div class="relative p-6">

            <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                <button id="close-button" type="button"
                        class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <h3 id="event-modal-title" class="text-secondary-900 text-lg font-medium">Create Event</h3>

            <form id="event-form" class="flex justify-around">

                <div class="mt-8 space-y-2 w-[45%]">


                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="title">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Title<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                <div class="min-w-0 flex-1">
                                    <input id="title" name="title"
                                           class="fi-input block w-full border-none bg-transparent py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 ps-3 pe-3"
                                           required="required" type="text">
                                </div>
                            </div>
                            <p id="title_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="date">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Date<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                <div class="min-w-0 flex-1">
                                    <input id="date" name="date"
                                           class="fi-input block w-full border-none bg-transparent py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 ps-3 pe-3"
                                           required="required" type="date">
                                </div>
                            </div>
                            <p id="date_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="status">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">Status<sup
                                        class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-select">
                                <div class="min-w-0 flex-1">
                                    <select id="status" name="status"
                                            class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3">
                                        <option value="">Select an option</option>
                                        <option value="PLANNED">Planned</option>
                                        <option value="BRIEFED">Briefed</option>
                                        <option value="IN_PROGRESS">In Progress</option>
                                        <option value="COMPLETED">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <p id="status_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="channel_type">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">Channel<sup
                                        class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-select">
                                <div class="min-w-0 flex-1">
                                    <select id="channel_type" name="channel_type"
                                            class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3">
                                        <option value="EMAIL">Email</option>
                                        <option value="TEXT">Text</option>

                                    </select>
                                </div>
                            </div>
                            <p id="channel_type_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="modality">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">Modality<sup
                                        class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-select">
                                <div class="min-w-0 flex-1">
                                    <select id="modality" name="modality"
                                            class="fi-select-input block w-full border-none bg-transparent py-1.5 pe-8 text-base text-gray-950 transition duration-75 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] dark:text-white dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 [&amp;_optgroup]:bg-white [&amp;_optgroup]:dark:bg-gray-900 [&amp;_option]:bg-white [&amp;_option]:dark:bg-gray-900 ps-3">
                                        <option value="ALM">ALM</option>
                                        <option value="LHR">LHR</option>
                                        <option value="CS">CS</option>
                                        <option value="BTX">BTX</option>
                                        <option value="XE">XE</option>
                                        <option value="FIL">FIL</option>
                                        <option value="ULT">ULT</option>
                                        <option value="IPL">IPL</option>
                                        <option value="CT">CT</option>
                                        <option value="CS/CT">CS/CT</option>
                                        <option value="IPL/ULT">IPL/ULT</option>
                                        <option value="WRX/INJ">WRX/INJ</option>
                                        <option value="WRX">WRX</option>
                                        <option value="BODY">BODY</option>
                                        <option value="FACE">FACE</option>
                                        <option value="OTH">OTH</option>

                                    </select>
                                </div>
                            </div>
                            <p id="modality_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="lead_forecast">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Leads Forecast<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                <div class="min-w-0 flex-1">
                                    <input id="lead_forecast" name="lead_forecast"
                                           class="fi-input block w-full border-none bg-transparent py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 ps-3 pe-3"
                                           required="required" type="text">
                                </div>
                            </div>
                            <p id="lead_forecast_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3" for="lead_actual">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Leads Actual<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup>
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                <div class="min-w-0 flex-1">
                                    <input id="lead_actual" name="lead_actual"
                                           class="fi-input block w-full border-none bg-transparent py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 ps-3 pe-3"
                                           required="required" type="text" disabled>
                                </div>
                            </div>
                            <p id="lead_actual_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>

                    <fieldset>

                        <div class="space-y-5">
                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input id="sync_wrike" name="sync_wrike" type="checkbox"
                                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="sync_wrike" class="font-medium text-gray-900">Synced with
                                        Wrike</label>
                                </div>
                                <div id="sync_wrike_error" class="text-red-500 text-sm hidden"></div>
                            </div>

                        </div>
                    </fieldset>

                    <input type="hidden" id="calendar_id" name="calendar_id" value=""/>
                    <div id="calendar_id_error" class="text-red-500 text-sm hidden"></div>
                    <div class="flex justify-between py-0 my-2">
                        <button type="submit"
                                class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200">
                            Create
                        </button>
                        <a id="viewLink" href="http://ideal-image-calendar-laravel.test/admin/events/"
                           target="_blank"
                           class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200">View</a>
                    </div>

                </div>

                <div class="mt-8 space-y-2 w-[45%]">

                    <!-- Text Area -->


                    <!-- Image Placeholder -->
                    <div class="grid gap-y-2">
                        <div
                            class="image-placeholder flex justify-center items-center  rounded-lg bg-white dark:bg-gray-900 h-[346px]">
                            <img id="creative_path" src="/storage/652c41cb79f6f5.13083292.jpg" class="h-full">
                        </div>
                    </div>

                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3"
                                   for="notes">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Planning Notes
                                </span>
                            </label>
                        </div>
                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white focus-within:ring-2 dark:bg-white/5 ring-gray-950/10 focus-within:ring-primary-600 dark:ring-white/20 dark:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                <div class="min-w-0 flex-1">
                                    <textarea id="notes" rows="10" name="notes"
                                              class="fi-input block w-full border-none bg-transparent py-1.5 text-base text-gray-950 outline-none transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 ps-3 pe-3"
                                              required="required"></textarea>
                                </div>
                            </div>
                            <p id="description_error"
                               class="fi-fo-field-wrp-error-message text-sm text-red-500 dark:text-danger-400">
                            </p>
                        </div>
                    </div>


                </div>
            </form>


        </div>
    </div>
</div>
