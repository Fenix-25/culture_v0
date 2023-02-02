<form action="/" method="post">
    <input type="hidden" name="type" value="createOption">
    <div class="row">
        <div class="mb-3 col-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="Fertilize">Fertilize</label>
                <select class="form-select" id="Fertilize" name="fertilize">
                    <option></option>
                    <?php foreach ($fertilizes as $fertilize): ?>
                        <option value="<?= $fertilize['id'] ?>"><?= $fertilize['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="input-group mb-3">
                <label class="input-group-text" for="Culture">Culture</label>
                <select class="form-select" id="Culture" name="culture">
                    <option></option>
                    <?php foreach ($cultures as $culture): ?>
                        <option value="<?= $culture['id'] ?>"><?= $culture['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Weight</span>
                <input type="number" step="0.01" class="form-control" placeholder="kg" aria-label="Username"
                       aria-describedby="basic-addon1" name="weight">
            </div>
        </div>
    </div>
    <button class="btn btn-outline-primary" type="submit">Create</button>

</form>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Fertilize</th>
            <th scope="col">Culture</th>
            <th scope="col">Weight</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($fertilizes as $fertilize): ?>
            <tr>
                <td rowspan="<?= \Culture\OptionController::listOfOption($fertilize['id']) ?>">
                    <?= $fertilize['name'] ?>
                </td>
            </tr>
            <?php foreach ($cultures as $culture): ?>
                <?php foreach ($weights as $weight): ?>
                    <?php if ($culture['id'] == $weight['culture_id']): ?>
                        <?php if ($fertilize['id'] == $weight['fertilize_id']): ?>
                            <tr>
                                <td>
                                    <?= $culture['name'] ?>
                                </td>
                                <td>
                                    <?= $weight['weight'] ?>
                                </td>
                                <td>
                                    <form action="/" method="post">
                                        <input type="hidden" name="type" value="deleteOption">
                                        <input type="hidden" name="weightId" value="<?= $weight['id'] ?>">
                                        <button type="submit" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
