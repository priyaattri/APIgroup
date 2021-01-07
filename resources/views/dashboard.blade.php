<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SocialMedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-20">
                    <p style="font-size: 50px; text-align: left">WELCOME!!<br><br>


                    </p>
                    <a href="/addPost" style="font-size: 30px">Add a new post
                        <x-jet-button class="ml-8; ">
                            {{ __('Add') }}
                        </x-jet-button>
                    </a>

                    <section class="row posts">
                                
                        <br>
                        <a href="/allPosts" style="font-size: 30px">Posts by others
                        <x-jet-button class="ml-8; ">
                            {{ __('View') }}
                        </x-jet-button>
                    </a>
                        
                    </section>
                </div>
            </div>              
        </div>    
    </div>
</x-app-layout>
