<div class="text-gray-300">
    <form method="POST" action="/teams" enctype="multipart/form-data" class="max-w-lg mx-auto  p-6 rounded-lg shadow-lg">
        @csrf

        <label class="block text-gray-400 font-bold mb-2">Team Name:</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">

        <label class="block text-gray-400 font-bold mt-4 mb-2">Team Logo:</label>
        <input type="file" name="logo" class="w-full px-4 py-2 border rounded-lg">

        <label class="block text-gray-400 font-bold mt-4 mb-2">Add Members (Emails):</label>
        <div class="flex items-center gap-2">
            <input type="email" id="emailInput" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <button type="button" onclick="addEmail()" class="px-4 py-2 bg-orange-800 text-white rounded-lg hover:bg-orange-600">Add</button>
        </div>

        <ul id="emailList" class="mt-4 space-y-2"></ul>
        <input type="hidden" name="members" id="membersInput">

        <button type="submit" class="w-full mt-6 px-4 py-2 bg-cyan-800 text-white font-bold rounded-lg hover:bg-cyan-900">Create Retro</button>

    </form>
</div>

<script>
    let emails = [];

    function addEmail() {
        let emailInput = document.getElementById('emailInput');
        let email = emailInput.value.trim();
        if (email && !emails.includes(email)) {
            emails.push(email);
            updateEmailList();
        }
        emailInput.value = '';
    }

    function removeEmail(email) {
        emails = emails.filter(e => e !== email);
        updateEmailList();
    }

    function updateEmailList() {
        let emailList = document.getElementById('emailList');
        let membersInput = document.getElementById('membersInput');
        emailList.innerHTML = '';
        emails.forEach(email => {
            let li = document.createElement('li');
            li.className = "flex justify-between items-center  px-4 py-2 rounded-lg";
            li.innerHTML = `${email} <button type="button" onclick="removeEmail('${email}')" class="text-red-500 hover:text-red-700">Remove</button>`;
            emailList.appendChild(li);
        });
        membersInput.value = emails;

        // console.log(emails)
        // console.log(membersInput.value)
    }
</script>


