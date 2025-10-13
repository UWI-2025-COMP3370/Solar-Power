<x-app-layout>
 <form method="POST" action="{{ route('item.find') }}">
 @csrf
 <!-- Search Term -->
 <div>
 <x-input-label for="searchterm" :value="__('Search Term')" />
 <x-text-input id="searchterm" class="block mt-1 w-full"
 type="text" name="searchterm" :value="old('searchterm')"
 required autofocus autocomplete="searchterm" />
 <x-input-error :messages="$errors->get('searchterm')"
 class="mt-2" />
 </div>
 <div>
 <x-primary-button class="ml-4">
 {{ __('Search') }}
 </x-primary-button>
 </div>
 </form>
</x-app-layout>