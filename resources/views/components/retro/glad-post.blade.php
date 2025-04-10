<div class="bg-green-900/70 p-3 ps-1 rounded relative cursor-pointer">
    <div class="flex items-center gap-x-2">
        <img class="rounded-xl w-10 border-1 border-cyan-500" :src="'{{ asset('storage') }}/' + post.author.photo"  alt="author photo">

        <p x-text="post.body" class="text-gray-300">  </p>
    </div>
    <div class=" flex gap-x-4 absolute -bottom-1 right-2">
        <div>
            <span x-text="post.comments.length"></span>
            <i class="fa-regular fa-message text-cyan-500"></i>
        </div>
        <div class="flex gap-1">
            <span x-text="post.reactions.filter(r => r.type === 'like').length"></span>
            <img @click.stop @click="submitGladLike(post.id)" src="{{ asset('images/sohomot_vai.jpg') }}" alt="Example Image" class="rounded-full w-6 h-6 hover:scale-400 transition ring-1 ring-green-500 cursor-pointer z-2">
        </div>
        <div class="flex gap-1">
            <span x-text="post.reactions.filter(r => r.type === 'dislike').length"></span>
            <img @click.stop @click="submitGladDislike(post.id)" src="{{ asset('images/poysa.jpg') }}" alt="Example Image" class="rounded-full w-6 h-6 hover:scale-400 transition ring-1 ring-green-500 cursor-pointer z-1">
        </div>
    </div>
</div>
