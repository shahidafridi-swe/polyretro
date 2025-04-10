<div x-data="teamActions" class="py-5 bg-gray-700/10">
    <div class=" text-center py-5 ">
        <i class="fa-solid fa-circle-check text-4xl text-gray-400 "></i>
        <h3 class="text-2xl text-gray-400 ">Team Actions</h3>
    </div>
    <div  class="py-5">
        @if($retro->status == 'in progress')
        <div>
            <form x-on:submit.prevent="submitAction"  action=""  class="max-w-lg mx-auto  rounded-lg shadow-lg">
                @csrf
                <input type="hidden" id="retro_id" name="retro_id" value="{{ $retro->id }}">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <i class="fa-solid fa-plus text-cyan-500 text-2xl"></i>
                    </div>
                    <input type="text" id="action_body" name="action_body" required  class="w-full ps-10 p-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-cyan-900/30" >
                </div>
            </form>
        </div>
        @endif

        <div class="space-y-3 mt-3">
            <template x-for="action in actions" :key="action.id">
                <button @click="openActionModal(action)" class="block w-full text-start">
                    <x-action.action :with_logo="false"></x-action.action>
                </button>

            </template>
        </div>
    </div>


    <!-- Main Modal -->
    <div id="action-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex flex-col items-center justify-center w-full h-full bg-black/80 bg-opacity-50">
        <div class="relative p-4 w-full max-w-2xl bg-cyan-950 rounded-lg shadow-lg ">
            <!-- Modal Header -->
            <div class="flex items-center justify-end  rounded-t dark:border-gray-600 border-gray-200">

                <button @click="closeModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 md:p-5">
                <div x-show="!actionEdit">
                    <p class="text-2xl font-semibold leading-relaxed text-gray-200 border-b border-cyan-500/30  pb-5 ">
                        <strong></strong> <span x-text="selectedAction ? selectedAction.body : ''"></span>
                        <i @click="actionEdit=true" class="fa-solid fa-pen-to-square ms-3 text-cyan-600 rounded-full p-2 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50  transition hover:scale-120 cursor-pointer"></i>
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 py-3">ADDED <span x-text="new Date(selectedAction.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' })"></span></p>

                    <div>
                        <button data-popover-target="priority-popover-click" data-popover-trigger="click" data-popover-placement="right" type="button" class="text-sm text-gray-500 dark:text-gray-400">PRIORITY <span>
                                <template x-if="selectedAction.priority=='high'">
                                    <i class="fa-solid fa-angles-up rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-red-800 transition"></i>
                                </template>
                                <template x-if="selectedAction.priority=='medium'">
                                    <i class="fa-solid fa-equals rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-yellow-800 transition"></i>
                                </template>
                                <template x-if="selectedAction.priority=='low'">
                                    <i class="fa-solid fa-angles-down rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-green-800 transition"></i>
                                </template>

                            </span></button>

                        <div data-popover id="priority-popover-click" role="tooltip" class="absolute z-10 invisible inline-block w-30 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 border-b  rounded-t-lg border-gray-600 bg-cyan-700">
                                <h3 class="font-semibold text-gray-100 text-center">PRIORITY</h3>
                            </div>
                            <div class="text-center">
                                <p @click="updateActionPriority('high')" class="bg-red-900/40 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-angles-up text-red-600"></i></p>
                                <p @click="updateActionPriority('medium')" class="bg-yellow-900/50 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-equals text-yellow-600"></i></p>
                                <p @click="updateActionPriority('low')" class="bg-green-900/50 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-angles-down text-green-600"></i></p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>


                    <p class="text-sm text-gray-500 dark:text-gray-400">DUE <span><i class="fa-solid fa-calendar-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></span></p>


                    <div>
                        <button data-popover-target="assign-popover-click" data-popover-trigger="click" data-popover-placement="right" type="button"  class="text-sm text-gray-500 dark:text-gray-400">ASSIGNED TO <span><i class="fa-solid fa-user-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-green-600 transition"></i></span></button>

                        <div data-popover id="assign-popover-click" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 border-b  rounded-t-lg border-gray-600 bg-cyan-700">
                                <h3 class="font-semibold text-gray-100 text-center">PRIORITY</h3>
                            </div>
                            <div class="text-center">
                                @foreach($members as $member)
                                    <p @click="assignMemberToAction({{$member->user_id}})" class="bg-cyan-900/40 p-2 border-b-1 cursor-pointer hover:bg-cyan-900 transition">{{$member->user->name}}</p>
                                @endforeach
                            </div>
                            <div data-popper-arrow></div>
                        </div>

                        <div>
                            <template x-for="member in selectedAction.assigned_users">
                                <span x-text="member.name" class="bg-green-700 rounded-2xl py-1 px-3 m-1"></span>
                            </template>
                        </div>
                    </div>


                </div>
                <div x-show="actionEdit">
                    <h3 class="text-4xl mb-5">Edit Action</h3>
                    <form action="" x-on:submit.prevent="updateAction" class=" mx-auto  rounded-lg shadow-lg p-5">
                        @csrf
                        @method('PUT')
                        <input type="text" id="updateActionBody" name="updateActionBody" required :value="selectedAction ? selectedAction.body : ''" class="w-full p-3 border border-gray-600/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-400/30 placeholder:text-gray-400/50">
                        <div class="mt-3 text-end space-x-2">
                            <a @click="actionEdit=false"  href="#" class=""><i class="fa-solid fa-xmark font-medium dark:text-red-500 rounded-full p-3 bg-red-800/30 ring-2 ring-red-800/50 text-red-800  transition hover:scale-120"></i></a>
                            <button type="submit" class=""><i class="fa-solid fa-check font-medium dark:text-cyan-500 rounded-full p-3 bg-cyan-800/30 ring-2 ring-cyan-800/50 text-cyan-800  transition hover:scale-120 "></i></button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Modal Footer -->
            <div class="flex items-center justify-between px-4 md:px-5  border-gray-200 rounded-b dark:border-gray-600 ">
                <div>
                    <span @click="toggleActionStatus()" x-show="!actionEdit" class="text-4xl "><i class="fa-regular fa-circle-check rounded-full text-green-100 cursor-pointer  transition  hover:shadow-xl hover:shadow-green-500/50 " :class="selectedAction.status === 'complete' ? 'text-green-500' : ''"></i></span>
                    <span class="uppercase text-gray-400">Action is <span x-text="selectedAction.status"></span></span>
                </div>

                <a x-show="!actionEdit" href="#" class=""><i class="fa-regular fa-trash-can font-medium dark:text-red-500 rounded-full p-3 hover:bg-red-800/30 hover:ring-2 hover:ring-red-800/50 text-red-800  transition hover:scale-120"></i></a>

            </div>

            <div x-show="!actionEdit" class=" flex gap-x-4 p-3">
                <div>
                    <span x-text="selectedAction.comments.length"></span>
                    <i class="fa-regular fa-message"></i>
                </div>
            </div>

            <div x-show="!actionEdit" class="p-4 w-full max-w-2xl bg-cyan-900/50 rounded-xl shadow-lg space-y-3">
                <div class="comment">

                    <div class="">
                        <form action="" x-on:submit.prevent="submitActionComment"  class=" mx-auto  rounded-lg shadow-lg">
                            @csrf
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center  pointer-events-none">
                                    <div class="rounded-full border-2 border-cyan-500 w-8 h-8">
                                        @if (auth()->check())
                                            <img class="rounded-full " src="{{ asset('storage/' . auth()->user()->photo) }}" alt="">
                                        @else
                                            <img class="rounded-full " src="https://picsum.photos/100" alt="">
                                        @endif
                                    </div>
                                </div>
                                <input type="text" id="actionCommentBody" name="actionCommentBody" required  class="w-full ps-15 p-1 border border-gray-600/50 rounded-full focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-900/30 placeholder:text-gray-400/50"  placeholder="Add Comment..." >
                            </div>
                        </form>
                    </div>
                </div>
                <div class="comment space-y-3">
                    <template x-for="comment in selectedAction.comments" :key="comment.id">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center  pointer-events-none">
                                <div class="rounded-full border-2 border-cyan-500 w-8 h-8">
                                    @if("comment.author.photo")
                                        <img class="rounded-full  object-cover" :src="'{{ asset('storage') }}/' + comment.author.photo"  alt="author photo">
                                    @else
                                        <img class="rounded-full " src="https://picsum.photos/100" alt="">
                                    @endif
                                </div>
                            </div>
                            <p x-text="comment.body" class="w-full ps-10 p-1 border border-gray-600/50 rounded-full focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-900/30 text-gray-400" ></p>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </div>

</div>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('teamActions', () => ({
            actions: [],
            retroId: "{{$retro->id}}",
            selectedAction: null,
            actionStatus:  null,
            actionEdit: false,
            init(){
                this.loadActions();
            },
            setSelectedAction(action) {
                this.selectedAction = action;
                this.actionStatus = action ? action.status : null;
            },
            loadActions(){
                fetch(`{{ url('actions') }}/${this.retroId}`)
                    .then(res=> res.json())
                    .then(data => {
                        this.actions = data;
                    })

            },

            toggleActionStatus() {
                let newStatus = this.selectedAction.status === 'complete' ? 'in_progress' : 'complete';
                let confirmation = confirm(`Are you sure you want to "${newStatus}" this action?`);
                if (!confirmation) return;

                fetch(`{{ url('/actions') }}/${this.selectedAction.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ status: newStatus })
                })

                    .then(() => {
                        this.retroStatus = newStatus;
                        location.reload();
                    })
                    .catch(error => alert(error.message));
            },

            async submitAction(){
                let formData = {
                    body : document.getElementById('action_body').value,
                    retro_id : document.getElementById('retro_id').value
                }
                console.log(formData)
                let response = await fetch("{{ route('actions.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(formData)
                });
                document.getElementById('action_body').value='';
                this.loadActions();
                toast("Action added successfully!");
            },

            assignMemberToAction(memberId)
            {
                let data = {
                    action_id : this.selectedAction.id,
                    member_id : memberId
                }
                fetch("{{ route('actions.assign.members') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(data)
                })
                    .then(res=> res.json())
                    .then(data=> toast(data.message))
                this.loadActions();
                this.closeModal();
            },

            actionComplete()
            {

            },

            openActionModal(action) {
                this.selectedAction = action;
                document.getElementById("action-modal").classList.remove("hidden");
            },
            closeModal() {
                this.selectedAction = null;
                this.actionEdit= false;
                document.getElementById("action-modal").classList.add("hidden");
            },

            updateAction(){
                const updatedBody = document.getElementById('updateActionBody').value;
                fetch(`{{ url('/actions') }}/${this.selectedAction.id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        body: updatedBody
                    })
                })
                    .then(() => {
                        this.actionEdit = false;
                        this.loadActions();
                        this.closeModal();
                    });
            },

            updateActionPriority(priority)
            {
                fetch(`{{ url('/actions') }}/${this.selectedAction.id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        priority: priority
                    })
                })
                    .then(() => {
                        this.actionEdit = false;
                        this.loadActions();
                        this.closeModal();
                    });
            },

            async submitActionComment(){
                let commentData = {
                    body: document.getElementById('actionCommentBody').value,
                    action_id: this.selectedAction.id,
                    author_id: {{ Auth::user()->id }}
                }


                await fetch("{{ route('action.comment.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(commentData)
                });

                document.getElementById('actionCommentBody').value = '';
                this.loadActions();
            },

        }))
    })

</script>
