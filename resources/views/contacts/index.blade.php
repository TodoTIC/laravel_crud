<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de contactos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex justify-end">
                <form class="grow" autocomplete="off">
                    <x-text-input name="search" type="search" class="mt-1 block w-1/3" placeholder="Buscar contacto" :value="request('search')" />
                </form>

                <a href="{{ route('contacts.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-none">
                    Crear contacto
                </a>
            </div>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Celular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="border px-4 py-2 bg-white">
                                {{ $contact->name }}
                            </td>
                            <td class="border px-4 py-2 bg-white">
                                {{ $contact->email }}
                            </td>
                            <td class="border px-4 py-2 bg-white">
                                {{ $contact->phone }}
                            </td>
                            <td class="border px-4 py-2 bg-white">
                                <a href="{{ route('contacts.edit', $contact) }}"
                                    class="text-blue-500 hover:text-blue-700 font-bold py-2 px-4 rounded">
                                    Editar
                                </a>
                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este contacto?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{ $contacts->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
