@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Elenco di posts:</h1>
        </div>
        <div class="col-4 text-left d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.posts.create') }}" type="button" class="btn btn-primary btn-sm">Nuovo Post</a>
        </div>
    </div>
</div>
<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a 
                        href="{{ 
                        route('admin.posts.index', 
                        [
                            'orderBy' => 'id', 
                            'dir' => Request::get('dir') === 'asc' ? 'desc' : 'asc'
                        ])
                        }}"
                        class="d-flex align-items-center"
                    >
                        #
                        <div 
                            class="
                            @if(Request::get('orderBy') === 'id') d-block
                            @else d-none
                            @endif
                        ">
                            <svg
                                class="
                                @if(Request::get('dir') === 'desc') order-desc 
                                @else order-asc
                                @endif ml-3 w-6 h-6 order-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </a>
                </th>
                <th scope="col">
                    <a 
                        href="{{ 
                        route('admin.posts.index', 
                        [
                            'orderBy' => 'title', 
                            'dir' => Request::get('dir') === 'asc' ? 'desc' : 'asc'
                        ])
                        }}"
                        class="d-flex align-items-center"
                    >
                        Title
                        <div 
                            class="
                            @if(Request::get('orderBy') === 'title') d-block
                            @else d-none
                            @endif
                        ">
                            <svg
                                class="
                                @if(Request::get('dir') === 'desc') order-desc 
                                @else order-asc
                                @endif ml-3 w-6 h-6 order-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </a>
                </th>
                <th scope="col">
                    <a 
                        href="{{ 
                        route('admin.posts.index', 
                        [
                            'orderBy' => 'slug', 
                            'dir' => Request::get('dir') === 'asc' ? 'desc' : 'asc'
                        ])
                        }}"
                        class="d-flex align-items-center"
                    >
                        Slug
                        <div 
                            class="
                            @if(Request::get('orderBy') === 'slug') d-block
                            @else d-none
                            @endif
                        ">
                            <svg
                                class="
                                @if(Request::get('dir') === 'desc') order-desc 
                                @else order-asc
                                @endif ml-3 w-6 h-6 order-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </a>
                </th>
                <th scope="col">
                    <a 
                        href="{{ 
                        route('admin.posts.index', 
                        [
                            'orderBy' => 'category_id', 
                            'dir' => Request::get('dir') === 'asc' ? 'desc' : 'asc'
                        ])
                        }}"
                        class="d-flex align-items-center"
                    >
                        Categoria
                        <div 
                            class="
                            @if(Request::get('orderBy') === 'category_id') d-block
                            @else d-none
                            @endif
                        ">
                            <svg
                                class="
                                @if(Request::get('dir') === 'desc') order-desc 
                                @else order-asc
                                @endif ml-3 w-6 h-6 order-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </a>
                </th>
                <th>
                    Tags
                </th>
                <th scope="col">
                    <a 
                        href="{{ 
                        route('admin.posts.index', 
                        [
                            'orderBy' => 'created_at', 
                            'dir' => Request::get('dir') === 'asc' ? 'desc' : 'asc'
                        ])
                        }}"
                        class="d-flex align-items-center"
                    >
                        Created_at
                        <div 
                            class="
                            @if(Request::get('orderBy') === 'created_at') d-block
                            @else d-none
                            @endif
                        ">
                            <svg
                                class="
                                @if(Request::get('dir') === 'desc') order-desc 
                                @else order-asc
                                @endif ml-3 w-6 h-6 order-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </a>
                </th>
                <th scope="col">Show</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->category ? $post->category->name : '-' }}</td>
                <td>
                    <ul>
                        @forelse ($post->tags as $tag)
                            <li>
                                <a href="{{ route('admin.tags.show', $tag->id) }}">
                                    {{ $tag->name }}
                                </a>
                            </li>
                        @empty
                            -
                        @endforelse
                    </ul>
                </td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post) }}" type="button" class="btn btn-primary btn-sm">
                        Vedi
                    </a>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="{{ '#popup'.$key }}" class="btn btn-danger btn-sm">
                        Elimina
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'popup'.$key }}" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="popupLabel">Elimina post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Eliminare l'articolo? L'azione è irreversibile...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annulla</button>
                            <form action="{{ 
                                route('admin.posts.destroy', $post)
                            }}" method="POST">
                                @csrf
                                @method('DELETE')
        
                                <input type="hidden" name="orderBy" value="{{ Request::get('orderBy') }}">
                                <input type="hidden" name="dir" value="{{ Request::get('dir') }}">
                                <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection