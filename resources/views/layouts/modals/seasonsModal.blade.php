<div class="modal fade" id="{{ $id }}Modal" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $name }}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <form method="get" action="documents/{{ $id }}" target="_blank">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="season">Saison </label>
                        <select class="form-control" name="season">
                            <option value="2017/2018">2017/2018</option>
                            <option value="2018/2019">2018/2019</option>
                            <option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                        </select>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <input class="btn btn-success" type="submit" value="Télécharger">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
