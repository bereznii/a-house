<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заполните информацию и менеджер Вам перезвонит в ближайшее время!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-form callback-modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone">Номер телефона</label>
                            <input type="text" name="callbackPhone" class="form-control" id="phone" placeholder="+380(XXX)XX-XX-XX" maxlength="20" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Имя</label>
                            <input type="text" name="callbackName" class="form-control" id="name" placeholder="Имя" maxlength="200" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="comment">Дополнительный комментарий</label>
                            <textarea name="callbackComment" class="form-control" id="comment"  placeholder="Комментарий" maxlength="10000" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success sendCallbackRequest-btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
