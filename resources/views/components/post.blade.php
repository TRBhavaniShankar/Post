@props(['item' => $item])

<div class="mb-4">
                        
    <a href="{{route('user.posts', $item->user)}}" class="font-bold"> {{$item->user->name}} <span class="text-gray-600 
        text-sm">{{$item->created_at}}</span></a>
    <p class="mb-2">{{$item->body}}</p>

    @can('delete', $item)
    <form action="{{ route('posts.destroy', $item) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
    @endcan

    <div class="flex items-center">
        @if (!$item->likedBy(auth()->user()))
        <form action="{{ route('posts.likes', $item)}}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>    
        @else
        <form action="{{ route('posts.likes', $item)}}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>    
        @endif

        <span>{{ $item->likes->count() }} {{ Str::plural('like', $item->likes->count()) }}</span>

    </div>
</div>