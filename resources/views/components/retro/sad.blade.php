<div x-data="sadPosts">
    <div>
        <span class="text-7xl"><i class="fa-regular fa-face-frown text-yellow-600"></i></span>
        <p class="font-bold">Sad</p>
        <p class="text-gray-400/50">What is disappointing you?</p>
    </div>
    <div class="py-2 px-1 bg-gray-800/50 rounded space-y-3">
        @if($retro->status == 'in progress')
        <div>
            <form x-on:submit.prevent="submitSadPost" id="sad-post-form" action=""  class="max-w-lg mx-auto   rounded-lg shadow-lg">
                @csrf
                <input type="hidden" id="retro_id" name="retro_id" value="{{ $retro->id }}">
                <input type="hidden" id="sad_type" name="sad_type" value="sad">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <i class="fa-solid fa-plus text-cyan-500 text-2xl"></i>
                    </div>
                    <input type="text" id="sad_body" name="sad_body" required  class="w-full ps-10 p-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-cyan-900/30 " >
                </div>
            </form>
        </div>
        @endif

        <div id="sad-post-list" class="space-y-3">
            <template x-for="post in posts" :key="post.id">
                <button @click="openSadModal(post)" class="block w-full text-start">
                    <x-retro.sad-post ></x-retro.sad-post>
                </button>

            </template>
        </div>
    </div>


    <!-- Main Modal -->
    <div id="sad-post-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex flex-col items-center justify-center w-full h-full bg-black/80 bg-opacity-50">
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
                <div x-show="!sadPostEdit">
                    <p class="text-2xl font-semibold leading-relaxed text-gray-200 border-b border-cyan-500/30  pb-5">
                        <strong></strong> <span x-text="selectedSadPost ? selectedSadPost.body : ''"></span>
                        <i @click="sadPostEdit=true" class="fa-solid fa-pen-to-square ms-3 text-cyan-600 rounded-full p-2 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50  transition hover:scale-120 cursor-pointer"></i>
                    </p>
                </div>
                <div x-show="sadPostEdit">
                    <h3 class="text-4xl mb-5">Edit Post</h3>

                    <form action="" x-on:submit.prevent="updateSadPost" class=" mx-auto  rounded-lg shadow-lg p-5">
                        @csrf
                        @method('PUT')
                        <input type="text" id="updateSadPostBody" name="updateSadPostBody" required :value="selectedSadPost ? selectedSadPost.body : ''" class="w-full p-3 border border-gray-600/50 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-400/30 placeholder:text-gray-400/50">
                        <div class="mt-3 text-end space-x-2">
                            <a @click="sadPostEdit=false"  href="#" class=""><i class="fa-solid fa-xmark font-medium dark:text-red-500 rounded-full p-3 bg-red-800/30 ring-2 ring-red-800/50 text-red-800  transition hover:scale-120"></i></a>
                            <button type="submit" class=""><i class="fa-solid fa-check font-medium dark:text-cyan-500 rounded-full p-3 bg-cyan-800/30 ring-2 ring-cyan-800/50 text-cyan-800  transition hover:scale-120 "></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="flex items-center justify-between p-4 md:p-5  border-gray-200 rounded-b dark:border-gray-600">
                <span class="text-gray-400"><i class="fa-regular fa-face-frown text-yellow-600 text-xl"></i> Sad</span>
                <a x-show="!sadPostEdit" href="#" class=""><i class="fa-regular fa-trash-can font-medium dark:text-red-500 rounded-full p-3 hover:bg-red-800/30 hover:ring-2 hover:ring-red-800/50 text-red-800  transition hover:scale-120"></i></a>


            </div>


            <div x-show="!sadPostEdit" class=" flex gap-x-4 p-3">
                <div>
                    <span x-text="selectedSadPost.comments.length"></span>
                    <i class="fa-regular fa-message"></i>
                </div>
                <div class="flex gap-1">
                    <span x-text="selectedSadPost.reactions.filter(r => r.type === 'like').length"></span>
                    <img @click="submitSadLike(selectedSadPost.id)" src="{{ asset('images/sohomot_vai.jpg') }}" alt="Example Image" class="rounded-full w-6 h-6 hover:scale-400 transition ring-1 ring-red-500 cursor-pointer z-2">
                </div>
                <div class="flex gap-1">
                    <span x-text="selectedSadPost.reactions.filter(r => r.type === 'dislike').length"></span>
                    <img @click="submitSadDislike(selectedSadPost.id)" src="{{ asset('images/poysa.jpg') }}" alt="Example Image" class="rounded-full w-6 h-6 hover:scale-400 transition ring-1 ring-red-500 cursor-pointer z-1">
                </div>
            </div>

            <div x-show="!sadPostEdit" class="p-4 w-full max-w-2xl bg-cyan-900/50 rounded-xl shadow-lg space-y-3">
                <div class="comment">

                    <div class="">
                        <form action="" x-on:submit.prevent="submitSadComment"  class=" mx-auto  rounded-lg shadow-lg">
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
                                <input type="text" id="sadCommentBody" name="sadCommentBody" required  class="w-full ps-15 p-1 border border-gray-600/50 rounded-full focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-900/30 placeholder:text-gray-400/50"  placeholder="Add Comment..." >
                            </div>
                        </form>
                    </div>
                </div>
                <div class="comment space-y-3">
                    <template x-for="comment in selectedSadPost.comments" :key="comment.id">
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
                            <p  x-text="comment.body" class="w-full ps-10 p-1 border border-gray-600/50 rounded-full focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-gray-900/30 text-gray-400" ></p>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sadPosts', () => ({
                posts: [],
                retroId: "{{$retro->id}}",
                selectedSadPost: null, // Store the selected post
                sadPostEdit: false,
                init(){
                    this.loadSadPosts();
                },
                loadSadPosts(){
                    fetch(`{{ url('sad-posts') }}/${this.retroId}`)
                        .then(res=> res.json())
                        .then(data => {
                            this.posts = data;

                    })
                },
                async submitSadPost(){
                    let formData = {
                        body : document.getElementById('sad_body').value,
                        type : document.getElementById('sad_type').value,
                        retro_id : document.getElementById('retro_id').value
                    }
                    console.log(formData)
                    let response = await fetch("{{ route('posts.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(formData)
                    });
                    document.getElementById('sad_body').value='';
                    this.loadSadPosts();
                },
                openSadModal(post) {
                    this.selectedSadPost = post;
                    document.getElementById("sad-post-modal").classList.remove("hidden");
                },
                closeModal() {
                    this.selectedSadPost = null;
                    this.sadPostEdit= false;
                    document.getElementById("sad-post-modal").classList.add("hidden");
                },

                updateSadPost(){
                    const updatedBody = document.getElementById('updateSadPostBody').value;
                    console.log(updatedBody)
                    fetch(`{{ url('/posts') }}/${this.selectedSadPost.id}`, {
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
                            this.madPostEdit = false;
                            this.loadSadPosts();
                            this.closeModal();
                            toast("Post updated successfully!")

                        });
                },

                async submitSadComment(){
                    let commentData = {
                        body: document.getElementById('sadCommentBody').value,
                        post_id: this.selectedSadPost.id,
                        author_id: {{ Auth::user()->id }}
                    }


                    await fetch("{{ route('comment.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(commentData)
                    });

                    document.getElementById('sadCommentBody').value = '';
                    this.loadSadPosts();
                },

                async submitSadLike(post_id) {
                    let tmpReact = await this.getReact({{ Auth::user()->id }}, post_id);

                    if (tmpReact && tmpReact.type === "like") {
                        await fetch(`/reacts/${post_id}/{{ Auth::user()->id }}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        });
                        toast("SOHOMOT VAI undo !!!")

                    } else {
                        if (tmpReact && tmpReact.type === "dislike") {
                            await fetch(`/reacts/${post_id}/{{ Auth::user()->id }}`, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                }
                            });
                            toast("POYSHA undo !!!")

                        }
                        let likeData = {
                            type: "like",
                            post_id: post_id,
                            user_id: {{ Auth::user()->id }}
                        };

                        await fetch("{{ route('react.store') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(likeData)
                        });
                        toast("SOHOMOT VAI !!!")

                    }

                    this.loadSadPosts();
                },

                async submitSadDislike(post_id) {
                    let tmpReact = await this.getReact({{ Auth::user()->id }}, post_id);

                    if (tmpReact && tmpReact.type === "dislike") {
                        await fetch(`/reacts/${post_id}/{{ Auth::user()->id }}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        });
                        toast("POYSHA undo !!!")

                    }
                    else {
                        if (tmpReact && tmpReact.type === "like") {
                            await fetch(`/reacts/${post_id}/{{ Auth::user()->id }}`, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                }
                            });
                            toast("SOHOMOT VAI undo !!!")

                        }
                        let likeData = {
                            type: "dislike",
                            post_id: post_id,
                            user_id: {{ Auth::user()->id }}
                        };

                        await fetch("{{ route('react.store') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(likeData)
                        });
                        toast("POYSHA !!!")

                    }

                    this.loadSadPosts();
                },


                async getReact(userID, postID){
                    let react
                    await fetch(`{{ url('reacts') }}/${postID}/${userID}`)
                        .then(res => res.json())
                        .then(data => {
                            console.log(data)
                            react = data
                        })

                    return react
                }
            }))
        })

</script>
