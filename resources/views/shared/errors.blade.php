@if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
