<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laravelで作ったあいすのホームページ</title>
</head>

<body class="max-w-[800px] mx-auto w-full px-4">
    <h1 class="text-3xl font-bold py-4">Laravelで作ったあいすのホームページ</h1>
    <p>phpで作ったホームページだよ</p>
    <section class="py-4">
        <h2 class="text-2xl pb-2">自己紹介</h2>
        <p>ラーメンが大好きです。21歳です。</p>
    </section>
    <section class="border-t py-4">
        <h2 class="text-2xl pb-2">あしあと</h2>
        @if ($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-400 p-4 rounded my-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <ul class="grid grid-cols-4 gap-4 w-full h-[230px] max-md:grid-cols-2">
            <li class="[grid-column:1_/_3] [grid-row:1_/_3] shadow">
                <div class="px-4 py-2 md:border rounded h-full w-full">
                    <h3 class="text-xl">足跡を残そう</h3>
                    <form action="/ashiatos" method="POST" class="py-1 flex flex-col gap-2 max-w-[500px] w-full">
                        @csrf
                        <div class="my-2">
                            <div class="flex gap-2 flex-col">
                                <label for="name">名前</label>
                                <input type="text" name="name" id="name" class="border rounded" required>
                            </div>
                            <div class="flex gap-2 flex-col">
                                <label for="like">好きな数字</label>
                                <input type="number" name="like" id="like" class="border rounded" required>
                            </div>
                        </div>

                        <button type="submit" class="border rounded hover:bg-gray-50 py-1">送信</button>
                    </form>
                </div>
            </li>
            @if (!$ashiatos->isEmpty())
            @foreach ($ashiatos->sortByDesc('created_at') as $ashiato)
            <li class="border p-2 rounded h-[115px] shadow">
                <p><span class="text-pink-800">{{ $ashiato->name }}</span>さんが来てくれたよ☆</p>
                <p>好きな数字は{{ $ashiato->like }}</p>
                <time class="text-sm text-gray-500"
                    datetime="{{ $ashiato->created_at }}">{{ $ashiato->created_at->format('Y/m/d H:i') }}</time>
            </li>
            @endforeach
            @else
            <li>
                <p>まだ誰もあしあとを残していません</p>
            </li>
            @endif
        </ul>


    </section>
</body>

</html>