<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('message') }}</div>
    @endif
    <form>
        @csrf
        <div class="bg-white shadow-md rounded px-6 pt-6 pb-4">
            <div class="mb-6">
                <label for="old" class="inline-block text-lg mb-2">
                    Senas slaptažodis
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="old" wire:model='old_password'/>
                @error('old_password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Naujas slaptažodis
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" wire:model='new_password'/>
                @error('new_password') <span class="error">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Patvirtinti slaptažodį
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="new_password_confirmation" wire:model='new_password_confirmation' />
                @error('new_password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                @enderror
            </div>
    
            <div class="mb-6">
                <button
                wire:click.prevent="submit()"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Išsaugoti
            </button>
            </div>
        </div>
    </form>
</div>
