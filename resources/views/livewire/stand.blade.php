<div class="container mx-auto p-4 table">

    <h1 class="text-3xl font-bold mb-4">{{ $this->stand->name }}</h1>

    <div class="overflow-x-auto ">
        <table class="w-full border-collapse border border-gray-300 table-fixed">
            <thead class="bg-gray-300 bg-opacity-10">
                <tr>
                    <th class="py-2 px-4 border text-center w-10"></th>
                    @for ($i = 1; $i <= $this->stand->columns; $i++)
                        <th class="py-2 px-4 border text-center w-48">{{ chr($i + 64) }}</th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < $this->stand->rows; $i++)
                    <tr class="border bg-gray-300 even:bg-opacity-10 odd:bg-opacity-20">
                        @for ($j = 0; $j < $this->stand->columns + 1; $j++)
                            @if ($j == 0)
                                <td class="py-5 border text-center">{{ $i + 1 }}</td>
                            @else
                                <td class="py-5 px-4 border text-center hover:bg-gray-200 dark:hover:bg-gray-700">
                                    @foreach ($items as $item)
                                        @if ($item->row_placement == $i + 1 && $item->column_placement == $j)
                                            <a href="/admin/items/{{ $item->id }}/edit">
                                                <li class="list-none">{{ $item->name }} Ø {{ $item->diameter }}
                                                    @if ($item->depth)
                                                        - {{ $item->depth }}
                                                    @endif
                                                </li>
                                            </a>
                                        @endif
                                    @endforeach
                                    <a
                                        href="/admin/items/create?name={{ $this->stand->name }}&row={{ $i + 1 }}&column={{ $j }}&stand_id={{ $this->stand->id }} "class="text-green-600 text-2xl px-2">+</a>
                                    <div class="text-xs font-thin opacity-60 ">{{ chr($j + 64) }}
                                        {{ $i + 1 }}
                                    </div>
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
