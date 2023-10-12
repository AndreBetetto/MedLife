<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-200 font-bold">
            <form action="{{route('crudUser.update', ['id'=> $user->id ])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="gap-8">
                    <div class="">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" required autofocus 
                        value="{{ $user->name }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                    </div>
                    <div class="">
                        <label for="email">Email</label>
                        <input id="email" class="dark:bg-slate-800 relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 sm:text-sm sm:leading-6" type="email" name="email" required autocomplete="username" 
                        value="{{ $user->email }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>
        
                <div class="gap-8">
                    <!-- Other user registration fields go here if needed -->
        
                    <div>
                        <x-primary-button type="submit">{{ __('Register') }}</x-primary-button>
                        <x-primary-button type="reset">{{ __('Clear') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
