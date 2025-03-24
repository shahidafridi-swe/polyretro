<div x-data="teamActions" class="py-5 bg-gray-700/10">
    <div class=" text-center py-5 ">
        <i class="fa-solid fa-circle-check text-4xl text-gray-400 "></i>
        <h3 class="text-2xl text-gray-400 ">Team Actions</h3>
    </div>
    <div  class="py-5">
        <div>
            <form x-on:submit.prevent="submitAction"  action=""  class="max-w-lg mx-auto  rounded-lg shadow-lg">
                @csrf
                <input type="hidden" id="retro_id" name="retro_id" value="{{ $retro->id }}">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <i class="fa-solid fa-plus text-cyan-500 text-2xl"></i>
                    </div>
                    <input type="text" id="action_body" name="action_body" required  class="w-full ps-10 p-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-cyan-900/30 " >
                </div>
            </form>
        </div>
        <div class="space-y-3">
            <template x-for="action in actions" :key="action.id">
                <x-action.action :with_logo="false"></x-action.action>
            </template>
        </div>

    </div>
</div>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('teamActions', () => ({
            actions: [],
            retroId: "{{$retro->id}}",

            init(){
                this.loadActions();
            },
            loadActions(){
                fetch(`{{ url('actions') }}/${this.retroId}`)
                    .then(res=> res.json())
                    .then(data => {
                        this.actions = data;

                    })
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
            }
        }))
    })

</script>
