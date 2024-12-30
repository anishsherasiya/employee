<ul>
    @foreach($employees as $employee)
        <li>
            {{ $employee->name }} - Reporting to: {{ $employee->reportingTo->name ?? 'CEO' }}
            @if($employee->children->isNotEmpty())
                @include('employees.hierarchy', ['employees' => $employee->children])
            @endif
        </li>
    @endforeach
</ul>
