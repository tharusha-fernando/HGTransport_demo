<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div>
        {{-- In work, do what you enjoy. --}}
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">Doc Expirations</h6>
            </div>

            <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <h6 class="text-red-500">Expired Docs</h6>
                </div>
                <!--div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" wire:model="search_data_vehicle_bu_" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Driver Names...." required>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div-->
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6 class="dark:text-white">Vehicles</h6>
                                </div>
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Vehicle Number</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Expired Doc</th>
                                        <!--th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Date</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Transport Type</th>
                                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th-->
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($Vehicles as $Vehicle)

                                        <tr>
                                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <a href="/view_vehicle/{{$Vehicle->id}}"><h6 class="mb-0 leading-normal text-sm">{{$Vehicle->vehicle_number}}</h6></a>
                                                        <!--p class="mb-0 leading-tight text-xs text-slate-400"{>{$Customer->email}}</p-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                                @foreach($exp_array['fitness_testExp'] as $fitness)
                                                    @if($fitness==$Vehicle->id)
                                                        <p class="mb-0 font-semibold leading-tight text-xs">Fitness Test</p>
                                                    @endif
                                                @endforeach
                                                @foreach($exp_array['emisions_testExp'] as $fitness)
                                                    @if($fitness==$Vehicle->id)
                                                            <p class="mb-0 font-semibold leading-tight text-xs">Emission Test</p>
                                                        @endif
                                                    @endforeach
                                                    @foreach($exp_array['insuarance_Exp'] as $fitness)
                                                        @if($fitness==$Vehicle->id)
                                                            <p class="mb-0 font-semibold leading-tight text-xs">Insuarance</p>
                                                        @endif
                                                    @endforeach
                                                    @foreach($exp_array['anual_revLicExp'] as $fitness)
                                                        @if($fitness==$Vehicle->id)
                                                            <p class="mb-0 font-semibold leading-tight text-xs">License</p>
                                                        @endif
                                                    @endforeach
                                            </td>

                                            <!--td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a href="javascript:;" class="font-semibold leading-tight text-xs text-slate-400"> Edit </a>
                                            </td-->
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
