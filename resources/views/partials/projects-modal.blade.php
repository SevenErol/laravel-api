<div class="modal fade" id="delete-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$project->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete-{{ $project->id }}">Stai per eliminare <strong>definitivamente</strong> un dato</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Stai per eliminare per sempre un elemento, sei sicuro di voler continuare? Se lo fai, non sarà più possibile recuperare i dati.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route ('admin.project.destroy', $project->id )}}" method="post">
                    @csrf

                    @method ('delete')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>