[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <div class="input-group center-block">
        <input type="text" class="form-control" aria-label="Text input with dropdown button">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Any</button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Name</a>
            <a class="dropdown-item" href="#">Client Name</a>
            <a class="dropdown-item" href="#">Account Number</a>
            <a class="dropdown-item" href="#">Co-Maker</a>
            </div>
        </div>
        <div class="input-group-append btn-primary">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Search</a>
            <a class="dropdown-item" href="#">List</a>
            <a class="dropdown-item" href="#">Add New</a>
            </div>
        </div>
    </div>
[[/block]]