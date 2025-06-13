<div>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <input type="input" placeholder="Category Name"/>
        <input type="input" placeholder="Description"/>
        <button type="submit">Save</button>
</div>
