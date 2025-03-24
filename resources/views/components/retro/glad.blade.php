<div x-data="gladPosts">
    <div>
        <span class="text-7xl"><i class="fa-regular fa-face-frown text-yellow-600"></i></span>
        <p class="font-bold">Glad</p>
        <p class="text-gray-400/50">What is disappointing you?</p>
    </div>
    <div class="py-2 px-1 bg-gray-800/50 rounded space-y-3">

        <div>
            <form x-on:submit.prevent="submitGladPost" id="glad-post-form" action=""  class="max-w-lg mx-auto   rounded-lg shadow-lg">
                @csrf
                <input type="hidden" id="retro_id" name="retro_id" value="{{ $retro->id }}">
                <input type="hidden" id="glad_type" name="glad_type" value="glad">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <i class="fa-solid fa-plus text-cyan-500 text-2xl"></i>
                    </div>
                    <input type="text" id="glad_body" name="glad_body" required  class="w-full ps-10 p-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-cyan-900/30 " >
                </div>
            </form>
        </div>

        <div id="glad-post-list" class="space-y-3">
            <template x-for="post in posts" :key="post.id">
                <x-retro.glad-post ></x-retro.glad-post>
            </template>
        </div>
    </div>
</div>

<script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gladPosts', () => ({
                posts: [],
                retroId: "{{$retro->id}}",

                init(){
                    this.loadGladPosts();
                },
                loadGladPosts(){
                    fetch(`{{ url('glad-posts') }}/${this.retroId}`)
                        .then(res=> res.json())
                        .then(data => {
                            this.posts = data;

                    })
                },
                async submitGladPost(){
                    let formData = {
                        body : document.getElementById('glad_body').value,
                        type : document.getElementById('glad_type').value,
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
                    document.getElementById('glad_body').value='';
                    this.loadGladPosts();
                }
            }))
        })

</script>
