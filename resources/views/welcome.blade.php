<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    {{-- Users with permission --}}
    <div class="flex fixed inset-0 justify-center items-center bg-gray-800 bg-opacity-50">
        <div class="bg-white p-2 rounded">
            <div class="flex justify-center">
                <h1 class="text-xl font-bold">Users with permission</h1>
            </div>
            <div>
                @php
                $groupedUsers = [];
            
                foreach ($users as $user) {
                    if (!isset($groupedUsers[$user->id])) {
                        $groupedUsers[$user->id] = [
                            'lname' => $user->lname,
                            'fname' => $user->fname,
                            'permissions' => []
                        ];
                    }
                   
                    $groupedUsers[$user->id]['permissions'] = array_merge($groupedUsers[$user->id]['permissions'], explode(',', $user->permissions));
                }
            @endphp
            
            @foreach ($groupedUsers as $userId => $user)
                <div class="flex flex-col space-x-2">
                    <div class="flex font-medium">
                        <h1>Name: {{ $user['lname'] }}, {{ $user['fname'] }}</h1>
                    </div>
                    
                    <div class="">
                        
                     <small>{{ implode(', ', array_unique($user['permissions'])) }}</small>

                    </div>
                   
                </div>
            @endforeach
            


                <div class="flex justify-center mt-2">
                  <button onclick="document.getElementById('users').classList.remove('hidden')"
                  class="px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-800 rounded">Add</button>
                </div>

            </div>
        </div>

        <div id="permissions" class="flex fixed inset-0 justify-center items-center bg-gray-800 bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded">
                <form action="{{ route('userAddPermission') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="id">
                    @foreach($permissions as $permission)
                        <div class="p-2 flex space-x-2">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            <div class="flex flex-col">
                                <span>{{ $permission->permission }}</span>
                                <small>{{ $permission->description }}</small>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-2 flex justify-between">
                        <button type="submit" class="px-4 py-2 bg-green-100 text-green-800 hover:bg-green-500 rounded">Submit</button>
                        <button onclick="document.getElementById('permissions').classList.add('hidden')" type="button" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-500 rounded">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    

{{-- Modal for users --}}
    <div id="users" class="flex fixed inset-0 justify-center items-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-2">
            <div>
                <div class="flex justify-between items-center">
                    <h1>All Users</h1>
                    <button onclick="document.getElementById('users').classList.add('hidden')" class="text-4xl">&times;</button>
                </div>
               

                <div class="flex flex-col overflow-y-auto h-64">
                    @foreach($allusers as $user)
                    <div onclick="
                    document.getElementById('permissions').classList.remove('hidden')
                    document.getElementById('id').value = {{$user->id}};
                    
                    " class="cursor-pointer hover:bg-gray-300">  
                    {{ $user->lname }} {{$user->fname}}
                    </div>

                @endforeach

                        <div>
                    
                    </div>

                    <div>

                </div>

                
            </div>
        </div>
    </div>
</body>
</html>