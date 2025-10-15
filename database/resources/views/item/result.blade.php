<x-app-layout>
 @auth
Results:
 @foreach($items as $item)
 <div>{{ $item->name }}{{ $item->price }}{{ $item->description }}
</div>
 @endforeach
 @endauth
</x-app-layout>