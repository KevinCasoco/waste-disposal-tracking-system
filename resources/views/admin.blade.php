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

    <!-- Modal -->
    {{-- <div id="admin" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div> --}}

        <!-- Button to trigger the modal -->
{{-- <button type="button" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-400" onclick="toggleModal()">
    Open Update Modal
</button>

<div id="admin" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-content py-4 text-left px-6">
                <!-- Title -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold text-black">Edit Profile</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div> --}}
    {{-- <!-- Form -->
    <form method="POST" action="{{ url('admin/'.$user->id) }}">
        @csrf
        @method('PUT')

        <!-- Email Input -->
        <div class="mb-4 mt-3">
            <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email</label>
            <input id="email" name="email" type="text"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                value="{{ old('email') ?? $user->email }}">
        </div>

        <!-- Full Name Input -->
        <div class="mb-4">
            <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Full Name</label>
            <input id="name" name="name" type="text"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                value="{{ old('name') ?? $user->name }}">
        </div>

        <!-- Role Select -->
        <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Select Role</label>
        <select id="role" name="role"
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="Collector" {{ $user->role == 'Collector' ? 'selected' : '' }}>Collector</option>
            <option value="Residents" {{ $user->role == 'Residents' ? 'selected' : '' }}>Residents</option>
        </select>

        <!-- Footer -->
        <div class="flex justify-end pt-2">
            <button type="button" class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">
                Cancel
            </button>
            <button type="submit" class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Save</button>
        </div>
    </form> --}}

    <!-- Modal -->
    {{-- <div id="updateModal" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Include the form here if you want to show it in the modal -->
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <!-- Button to trigger the modal -->
    <button type="button" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-400" onclick="toggleModal()">
        Open Update Modal
    </button> --}}

    {{-- <script>
    function toggleModal() {
        document.getElementById('admin').classList.toggle('hidden');
    }
</script> --}}

{{-- <script>
    function toggleModal() {
        document.getElementById('admin').classList.toggle('opacity-0');
        document.getElementById('admin').classList.toggle('pointer-events-none');
    }
</script> --}}
{{--
        </div>
    </div>
</div> --}}





  {{-- <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New Product
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form action="#" class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                          <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                          <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected="">Select category</option>
                              <option value="TV">TV/Monitors</option>
                              <option value="PC">PC</option>
                              <option value="GA">Gaming/Console</option>
                              <option value="PH">Phones</option>
                          </select>
                      </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                          <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new product
                  </button>
              </form>
          </div>
      </div>
  </div> --}}



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
                    {{-- <td class="text-sky-500 text-center"> --}}
                        {{-- <style>
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
                    </td> --}}

                    {{-- <td><a href="{{ route('admin.edit', $user->id) }}" class="edit-link" data-target="#admin">Edit</a></td> --}}
                    {{-- <td><a href="" class="edit-link" data-target="#admin">Edit</a></td> --}}
                    <td>
                        <!-- Modal toggle -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Edit
                        </button>
                    </td>
                    <td>
                        <!-- Delete button -->
                        <form method="post" action="{{ route('admin.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
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

{{-- <script>
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

  </script> --}}
  {{-- End Modal --}}

 {{-- <!-- Modal -->
 <script>
    var openButton = document.getElementById('admin');
    var dialog = document.getElementById('dialog');
    var closeButton = document.getElementById('close');
    var overlay = document.getElementById('overlay');

    // show the overlay and the dialog
    openButton.addEventListener('click', function () {
        dialog.classList.remove('hidden');
        overlay.classList.remove('hidden');
    });
</script> --}}

{{-- <script>
    var openButton = document.querySelector('.edit-link[data-target="#admin"]');
    var dialog = document.getElementById('admin');
    var overlay = document.querySelector('.modal-overlay');

    // show the overlay and the dialog
    openButton.addEventListener('click', function (event) {
        event.preventDefault();
        dialog.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.remove('hidden');
    });

    // close the modal
    function closeModal() {
        dialog.classList.add('opacity-0', 'pointer-events-none');
        overlay.classList.add('hidden');
    }

    // close the modal when clicking on the overlay
    overlay.addEventListener('click', closeModal);

    // close the modal when clicking on the close button
    var closeButton = document.querySelector('.modal-close');
    closeButton.addEventListener('click', closeModal);
</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var editLinks = document.querySelectorAll('.edit-link');
        for (var i = 0; i < editLinks.length; i++) {
            editLinks[i].addEventListener('click', function (event) {
                event.preventDefault();
                var modalId = this.getAttribute('data-target').substring(1); // Remove the "#" from the target
                populateModal(modalId);
                toggleModal(modalId);
            });
        }
    });

    function populateModal(modalId) {
        // Implement logic to populate modal fields based on the modalId
        // You can use the modalId to identify the corresponding modal and fetch data accordingly
    }

    function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.classList.toggle('opacity-0');
        modal.classList.toggle('pointer-events-none');
        // You may also need to handle the overlay if your modal has one
    }
</script> --}}

<!-- Add this script at the end of your HTML body or in a separate script file -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const modalButton = document.querySelector('[data-modal-toggle="crud-modal"]');
      const modal = document.getElementById('crud-modal');

      // Function to toggle the modal visibility
      function toggleModal() {
        modal.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden'); // Optional: Prevent scrolling when the modal is open
      }

      // Event listener for the modal toggle button
      modalButton.addEventListener('click', toggleModal);

      // Close the modal when the close button inside the modal is clicked
      const closeButton = modal.querySelector('[data-modal-toggle="crud-modal"]');
      if (closeButton) {
        closeButton.addEventListener('click', toggleModal);
      }

      // Close the modal when the overlay (outside the modal) is clicked
      modal.addEventListener('click', function (event) {
        if (event.target === modal) {
          toggleModal();
        }
      });

      // Close the modal when the 'Esc' key is pressed
      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
          toggleModal();
        }
      });
    });
  </script>


@endif

</x-app-layout>
