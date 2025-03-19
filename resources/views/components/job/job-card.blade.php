<div class="w-100 rounded-2xl bg-white p-4 flex-col flex">
    <div class="flex-row flex">
        <div class="w-12 h-12 bg-gray-300 rounded-lg">
            <img src="{{$job -> user -> company -> logo}}"  alt="logo"/>
        </div>
        <div class="flex flex-col ml-4">
            <p class="font-semibold text-lg">{{$job->title}}</p>
            <p class="text-gray-700 text-sm">{{$job -> user?-> company?-> name ?? 'No company'}}</p>
        </div>
        <x-heroicon-o-bookmark class="w-7 h-7 text-gray-300 ml-auto" />
    </div>
    <div class="flex-row flex gap-2 mt-4 flex-wrap">
        @foreach($job -> tags as $tag)
            <div class="bg-blue-100 text-secondary px-4 py-1 rounded-lg text-xs font-semibold">
                {{ $tag -> name }}
            </div>
        @endforeach
    </div>
    <div class="text-gray-700 text-sm mt-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
    </div>
    <hr class="my-4 border-gray-300 mb-2">
    <div class="flex justify-between">
        <p class="text-gray-700 font-bold text-sm">MYR {{$job -> salary}} <span class="text-gray-400 font-light">/year</span></p>
        <p class="text-gray-400 text-sm font-light">Posted 2 days ago</p>
    </div>
</div>
