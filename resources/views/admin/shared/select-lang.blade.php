@foreach ($record->langChildren as $child)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#" onclick="goToEdit({{ $child->id }})">
            <i class="bi bi-pencil"></i> {{ $child->langs ? $child->langs->name : 'Ngôn ngữ đã bị xóa' }}
        </a>
        
        @if ($child->langs)
            <a onclick="goToEdit({{ $child->id }})" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-pencil"></i> Sửa
            </a>
        @endif
        <a href="#" onclick="confirmDelete({{ $child->id }})" class="btn btn-sm btn-outline-danger">
            <i class="bi bi-trash"></i> Xóa
        </a>
    </li>
@endforeach
