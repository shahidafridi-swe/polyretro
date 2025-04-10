<x-app-layout>

<section class=" max-w-7xl mx-auto ">
    <div class="flex justify-between items-center text-cyan-500/70  border-b border-b-cyan-500/30">
        <h3 class="uppercase text-4xl font-semibold">Team {{$team->name}} </h3>
        <div>
            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Members')" >Members</button>
                <button class="tablinks" onclick="openCity(event, 'Retrospectives')" >Retrospectives</button>
                <button class="tablinks hover:bg-cyan-500/10 " onclick="openCity(event, 'Dashboard')" id="defaultOpen">Dashboard</button>
            </div>


        </div>
    </div>
    <!-- Tab content -->
    <div id="Dashboard" class="tabcontent">
        <x-teams.dashboard :retros="$retros" :team="$team" :members="$members" :actions="$actions"></x-teams.dashboard>
    </div>

    <div id="Retrospectives" class="tabcontent">
        <x-teams.retrospectives :retros="$retros" :team="$team" :members="$members"></x-teams.retrospectives>
    </div>

    <div id="Members" class="tabcontent">
        <x-teams.members :members="$members"></x-teams.members>
    </div>


    <x-teams.add-member-modal></x-teams.add-member-modal>
    <x-retro.create-modal :team="$team"></x-retro.create-modal>



</section>

    <script>
        function openCity(evt, cityName) {
            let i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
</x-app-layout>
