<x-app>
{{--    SideBar--}}

    <div class="flex bg-gray-100 text-gray-900">
        <aside class="flex h-screen w-20 flex-col items-center border-r border-gray-200 bg-white">
            <div class="flex h-[4.5rem] w-full items-center justify-center border-b border-gray-200 p-2">
                <h1 class="text-center font-bold">TODO APP</h1>
            </div>
            <nav class="flex flex-1 flex-col gap-y-4 pt-10">
                <button  data-modal-target="openmodal" data-modal-toggle="openmodal" class="group relative rounded-xl bg-gray-100 p-2 text-blue-600 hover:bg-gray-50">
                    <svg class="h-6 w-6 stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 9V15M9 12H15H9Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                        <div class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                            <div class="absolute inset-0 -left-1 flex items-center">
                                <div class="h-2 w-2 rotate-45 bg-white"></div>
                            </div>
                            Layouts <span class="text-gray-400">(Y)</span>
                        </div>
                    </div>
                </button>

            </nav>

            <div class="flex flex-col items-center gap-y-4 py-10 ">


                <button wire:click="logout"  class="mt-2 rounded-full bg-gray-100">
                    <img class="h-10 w-10 rounded-full" src="https://img.icons8.com/fluency-systems-regular/48/exit--v1.png" alt="" />
                </button>
            </div>
        </aside>
{{--        main content--}}

            <div class="w-full " >
                <form class="max-w-md mx-auto">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                {{--        Todocard--}}


                @foreach($todos as $todo)



                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ml-5 mt-5">

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$todo['title']}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$todo['content']}}</p>
                    <button data-modal-target="openmodal2" data-modal-toggle="openmodal2"  id="editbutton"   class="inline-flex font-medium items-center text-blue-600 hover:underline" onclick="openMode({{$todo}})">

                       <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </button>
                    <button wire:click="delete({{$todo['id']}})"  class="inline-flex font-medium items-center text-blue-600 hover:underline">
                      <svg height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
                    </button>

                </div>

                @endforeach
                    {{--                mainmodel--}}
                <div id="openmodal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Sign in to our platform
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="openmodal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">

                                <form class="space-y-4" wire:submit="save" >
                                    <div>
                                        <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ToDo Title</label>
                                        <input id="title" type="text" wire:model="title" name="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required />


                                    </div>
                                    <div>
                                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ToDo Content</label>
                                        <textarea id="content" type="text" wire:model="content" name="content"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                                    </div>

                                    <button  id="edit-form" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
{{--                edit model--}}
                <div id="openmodal2"  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">

                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="openmodal2">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">

                                <form class="space-y-4" wire:submit="update" >
                                    <div>
                                        <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ToDo Title</label>
                                        <input id="title_edit" type="text" wire:model="title_edit" name="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required />
                                        <input id="todo_id" type="hidden" wire:model.number="todo_id" name="todo_id" />


                                    </div>
                                    <div>
                                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ToDo Content</label>
                                        <textarea id="content_edit" type="text" wire:model="content_edit" name="content"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                                    </div>

                                    <button  id="edit-form" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    <script>
        const openMode = (todo) => {
            console.log(todo)
            document.getElementById('title_edit').value = todo.title;
            document.getElementById('todo_id').value = todo.id;
            document.getElementById('content_edit').textContent = todo.content;


        }

        // const createbuttoninput = () => {
        //     document.getElementById('title').value = "";
        //     document.getElementById('todoid').value = null;
        //     document.getElementById('content').value = "";
        //     document.getElementById('edit-form').textContent='Create'
        // }
    </script>

</x-app>
