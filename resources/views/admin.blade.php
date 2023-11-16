<x-app-layout>
     @if (Auth::user()->role == 'admin')

    <!-- START SIDEBAR -->
    <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
        <a class="flex item-center pb-4 border-b border-b-gray-700">
            <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="w-16 h-16 rounded object-cover">
            <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
        </a>

        <ul class="mt-2" >
            <li class="mb-1 group">
                <a href="{{ asset('dashboard')}}"  class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                      <i class="ri-dashboard-fill mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <li class="mb-1 group active">
                    <a href="{{ asset('admin')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-admin-fill mr-3 text-lg"></i>
                    <span class="text-sm">Admin</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{ asset('collector')}}"  class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                    <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                    <span class="text-sm">Collector</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{ asset('residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                    <i class="ri-user-fill mr-3 text-lg"></i>
                    <span class="text-sm">Residents</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{ asset('schedule')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                    <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                    <span class="text-sm">Schedule</span>
                </a>
            </li>
            {{-- <li class="mb-1 group">
                <a href="Settings.html" class="flex items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-settings-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Settings</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="Login.html" class="flex items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-logout-box-line mr-3 text-lg"></i>
                    <span class="text-sm">Logout</span>
                </a>
            </li> --}}
        </ul>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- END SIDEBAR -->

<!--Container-->
<div class="md:w-[calc(100%-256px)] md:ml-64 xl:w-[79.7%] mx-auto px-2 p-5 bg-gray-100">

    <!-- Start Table -->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Full Name</th>
                    <th data-priority="2">Email Address</th>
                    {{-- <th data-priority="3">Contact Number</th> --}}
                    <th data-priority="3">Role</th>
                    <th data-priority="4">Edit</th>
                    <th data-priority="5">Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td class="text-sky-500 text-center">
                        <style>
                            .modal {
                              transition: opacity 0.25s ease;
                            }
                            form.modal-active {
                              overflow-x: hidden;
                              overflow-y: visible !important;
                            }
                          </style>


                            <button class="modal-open hover:border-indigo-900 text-blue-500 hover:text-indigo-900 font-bold py-2 px-4 rounded-full">Edit</button>


                        <!--Modal-->
                        <div id="modal-popup" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                          <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                            <div class="modal-content py-4 text-left px-6">
                              <!--Title-->
                              <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold text-black">Edit Profile</p>
                                <div class="modal-close cursor-pointer z-50">
                                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                  </svg>
                                </div>
                              </div>

                              <!--Body-->
                              <div class="mb-4 mt-3">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_title">
                              </div>

                              <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Full Name</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_title">
                             </div>

                             <label for="countries" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Select Role</label>
                                <select id="countries" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                                <option selected>Role</option>
                                <Option>Admin</Option>
                                <Option>Collector</Option>
                                <Option>Residents</Option>
                              </Select>

                              <!--Footer-->
                              <div class="flex justify-end pt-2">
                                <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Cancel</button>
                                <button class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Save</button>
                              </div>

                            </div>

                          </div>
                        </div>

                        <script>
                          var openmodal = document.querySelectorAll('.modal-open')
                          for (var i = 0; i < openmodal.length; i++) {
                            openmodal[i].addEventListener('click', function(event){
                              event.preventDefault()
                              toggleModal()
                            })
                          }

                          const overlay = document.querySelector('.modal-overlay')
                          overlay.addEventListener('click', toggleModal)

                          var closemodal = document.querySelectorAll('.modal-close')
                          for (var i = 0; i < closemodal.length; i++) {
                            closemodal[i].addEventListener('click', toggleModal)
                          }

                          document.onkeydown = function(evt) {
                            evt = evt || window.event
                            var isEscape = false
                            if ("key" in evt) {
                              isEscape = (evt.key === "Escape" || evt.key === "Esc")
                            } else {
                              isEscape = (evt.keyCode === 27)
                            }
                            if (isEscape && document.body.classList.contains('modal-active')) {
                              toggleModal()
                            }
                          };


                          function toggleModal () {
                            const body = document.querySelector('body')
                            const modal = document.querySelector('.modal')
                            modal.classList.toggle('opacity-0')
                            modal.classList.toggle('pointer-events-none')
                            body.classList.toggle('modal-active')
                          }

                        </script>
                        {{-- End Modal --}}
                    </td>


                    <td class="text-red-500 text-center">Delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!--End Table-->

</div>
<!--/container-->

<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>



@endif

</x-app-layout>
